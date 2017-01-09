<?php

namespace XorLib;

/**
 * XorLib
 * A simple XOR obfuscation library.
 *
 * @author Nathaniel Blackburn <support@nblackburn.uk>
 * @license http://choosealicense.org/license/mit MIT
 */
class Obfuscator
{
    /**
     * @var
     */
    protected $secret;

    /**
     * @param $secret
     */
    public function __construct($secret)
    {
        // Set the secret.
        $this->secret = $secret;
    }

    /**
     * @param $message
     *
     * @return bool
     */
    private function encoded($message)
    {
        // Return if the string was encoded.
        return (base64_encode(base64_decode($message, true)) === $message);
    }

    /**
     * @param $message
     * @param bool $encode
     *
     * @return string
     */
    public function encrypt($message, $encode = false)
    {
        // Store the encoded characters.
        $encoded = '';

        // Loop though each of the characters.
        for ($index = 0; $index < strlen($message); $index++) {

            // Encode the character.
            $encoded .= $message[$index] ^ $this->secret[$index % strlen($this->secret)];
        }

        // If encode is true, return the base64 encoded string.
        if ($encode) {
            $encoded = base64_encode($encoded);
        }

        // Return the encoded string.
        return $encoded;
    }

    /**
     * @param $message
     *
     * @return string
     */
    public function decrypt($message)
    {
        // Store the decoded characters.
        $decoded = '';

        // Ensure the message is base64 encoded.
        if ($this->encoded($message)) {

            // Decode the base64 encoded string.
            $message = base64_decode($message);
        }

        // Loop though each of the characters.
        for ($index = 0; $index < strlen($message); $index++) {

            // Decode the character.
            $decoded .= $message[$index] ^ $this->secret[$index % strlen($this->secret)];
        }

        // Return the string.
        return $decoded;
    }
}
