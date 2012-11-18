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

        $this->initialize();
    }

    public function initialize()
    {
        $this['dir.root']  = realpath(dirname(__FILE__) . '/../../../');
        $this['dir.views'] = $this['dir.root'] . '/views';

        // Register service providers
        $this->register(new Yuyat_WebPhacilitator_Provider_PdoProvider, array(
            'db.host'     => '',
            'db.user'     => '',
            'db.password' => '',
            'db.database' => '',
        ));
        $this->register(new Yuyat_WebPhacilitator_Provider_DataMapperProvider);
        $this->register(new Yuyat_WebPhacilitator_Provider_TwigProvider);

        // Register routing
        $this->get('/', array($this, 'index'));
    }

    public function index()
    {
        return $this->render('index.twig');
    }

    public function render($file, $variables = array())
    {
        $this->response->write($this['twig']->render($file, $variables));
    }
}
