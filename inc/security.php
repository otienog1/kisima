<?php

define ('HMAC_SHA256', 'sha256');
define ('SECRET_KEY', '1a461872bacd4dac88feed9f8f2980e173d5d23e89654ed7b4d9a835c1bd3f1088040591813642ccb2e1185933cfae7d48d4f5b332e3446cbe1c68b47c518ae622ce6c60c5b7422386bd268f2f004f0d3dc8ca22d0764a9eb433490e4b6df6c3affc31fd13224da4a4f33b3169e582874b223fe42345494e99ec14cedcf65906');

function sign ($params) {
  return signData(buildDataToSign($params), SECRET_KEY);
}

function signData($data, $secretKey) {
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}

function buildDataToSign($params) {
        $signedFieldNames = explode(",",$params["signed_field_names"]);
        foreach ($signedFieldNames as $field) {
           $dataToSign[] = $field . "=" . $params[$field];
        }
        return commaSeparate($dataToSign);
}

function commaSeparate ($dataToSign) {
    return implode(",",$dataToSign);
}

?>
