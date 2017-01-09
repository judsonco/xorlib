<?php

use XorLib\Obfuscator;

/**
 * ObfuscatorTest
 * A simple test suite for XorLib.
 *
 * @author Nathaniel Blackburn <support@nblackburn.uk>
 * @license http://choosealicense.org/license/mit MIT
 */
class ObfuscatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected $decrypted = 'Hello World!';

    /**
     * @var string
     */
    protected $encrypted = 'LQYPA1kYJDsKDx5k';

    /**
     * @var string
     */
    protected $secret  = 'ecco68sTxczEYMw2H1YxH3E647Tfqh3a';

    /**
     * Basic encryption test.
     */
    public function testEncrypt()
    {
        $xor = new Obfuscator($this->secret);

        $this->assertEquals($this->encrypted, $xor->encrypt($this->decrypted, true));
    }

    /**
     * Basic decryption test.*
     */
    public function testDecrypt()
    {
        $xor = new Obfuscator($this->secret);

        $this->assertEquals($this->decrypted, $xor->decrypt($this->encrypted));
    }
}