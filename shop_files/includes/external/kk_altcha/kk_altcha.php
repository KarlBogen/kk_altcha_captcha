<?php
/* ------------------------------------------------------------
  Module "ALTCHA - Captcha" made by Karl

  modified eCommerce Shopsoftware
  http://www.modified-shop.org

  Released under the GNU General Public License
-------------------------------------------------------------- */

require 'vendor/autoload.php';

use AltchaOrg\Altcha\Altcha;
use AltchaOrg\Altcha\Algorithm\Pbkdf2;
use AltchaOrg\Altcha\HmacAlgorithm;
use AltchaOrg\Altcha\ChallengeParameters;
use AltchaOrg\Altcha\Challenge;
use AltchaOrg\Altcha\CreateChallengeOptions;
use AltchaOrg\Altcha\Payload;
use AltchaOrg\Altcha\ServerSignature;
use AltchaOrg\Altcha\Solution;
use AltchaOrg\Altcha\VerifySolutionOptions;

class kk_altcha_modified
{

    private $pbkdf2;
    private $altcha;
    private $hmacSecret;


    function __construct()
    {

        $this->hmacSecret = getenv('ALTCHA_HMAC_SECRET') ?: constant('MODULE_SYSTEM_KK_ALTCHA_SECRET');

        switch (MODULE_SYSTEM_KK_ALTCHA_ALGORITHM) {
            case 'SHA384':
                $this->pbkdf2 = new Pbkdf2(HmacAlgorithm::SHA384);
                break;
            case 'SHA512':
                $this->pbkdf2 = new Pbkdf2(HmacAlgorithm::SHA512);
                break;
            default:
                $this->pbkdf2 = new Pbkdf2();
        }

        $this->altcha = new Altcha($this->hmacSecret);
    }


    // -- Handlers --

    function handleChallenge(): array
    {
        $challenge = $this->altcha->createChallenge(new CreateChallengeOptions(
            algorithm: $this->pbkdf2,
            cost: 10000,
            expiresAt: time() + 120,
        ));

        $data = $challenge->toArray();
        $result = array('data' => $data, 'status' => 200);
        return $result;
    }

    function handleSubmit(): array
    {
        $altchaField = $_POST['altcha'] ?? null;
        $result = array();
        if (!is_string($altchaField) || $altchaField === '') {
            $result = array('data' => ['error' => 'Missing "altcha" form field'], 'status' => 400);
            return $result;
        }

        // Decode the base64-encoded payload
        $decoded = base64_decode($altchaField, true);
        if ($decoded === false) {
            $result = array('data' => ['error' => 'Invalid base64 in "altcha" field'], 'status' => 400);
            return $result;
        }

        $payload = json_decode($decoded, true);
        if (!is_array($payload)) {
            $result = array('data' => ['error' => 'Invalid JSON in "altcha" field'], 'status' => 400);
            return $result;
        }

        // Auto-detect payload type:
        //   Server signature: has "verificationData"
        //   Client solution:  has "challenge" + "solution"
        if (isset($payload['verificationData'])) {
            $result = ServerSignature::verifyServerSignature($payload, $this->hmacSecret);
            $verified = $result->verified;
        } elseif (isset($payload['challenge'], $payload['solution'])) {
            $challengeData = $payload['challenge'];
            $solutionData = $payload['solution'];

            if (!is_array($challengeData) || !is_array($solutionData)) {
                $result = array('data' => ['error' => 'Invalid challenge or solution format'], 'status' => 400);
                return $result;
            }

            $challenge = new Challenge(
                ChallengeParameters::fromArray($challengeData['parameters'] ?? []),
                $challengeData['signature'] ?? null,
            );
            $solution = new Solution(
                counter: (int) ($solutionData['counter'] ?? 0),
                derivedKey: (string) ($solutionData['derivedKey'] ?? ''),
            );
            $result = $this->altcha->verifySolution(new VerifySolutionOptions(
                payload: new Payload($challenge, $solution),
                algorithm: $this->pbkdf2,
            ));
            $verified = $result->verified;
        } else {
            $result = array(
                'data' => ['error' => 'Unrecognized payload format'],
                'status' => 400
            );
            return $result;
        }

        if (!$verified) {
            $result = array(
                'data' => [
                    'error' => 'Verification failed',
                    'verification' => $result
                ],
                'status' => 403
            );
            return $result;
        }

        // Payload verified — process form data
        $formData = $_POST;

        $result = array(
            'data' => [
                'data' => $formData,
                'verification' => $result
            ],
            'status' => 200,
            'verified' => $verified
        );
        return $result;
    }

// -- Helpers --

    /**
     * @param array<string, mixed> $data
     */
    function sendJson(array $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n";
    }
}
