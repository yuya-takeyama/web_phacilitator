<?php
/**
 * This file is part of WebPhacilitator.
 *
 * (c) Yuya Takeyama
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * The Application.
 *
 * @author Yuya Takeyama
 */
class Yuyat_WebPhacilitator_Application extends Sumile_Application
{
    public function __construct()
    {
        parent::__construct();

        $this->configure();

        $this->initialize();
    }

    public function initialize()
    {
        $this->get('/', array($this, 'index'));
    }

    public function configure()
    {
    }

    public function index()
    {
        echo "Hello, World!";
    }
}
