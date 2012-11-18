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
    private $dataMappers = array();

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
            'db.host'     => 'localhost',
            'db.user'     => 'root',
            'db.password' => null,
            'db.database' => 'phacilitator_development',
        ));
        $this->register(new Yuyat_WebPhacilitator_Provider_DataMapperProvider);
        $this->register(new Yuyat_WebPhacilitator_Provider_TwigProvider);

        // Register routing
        $this->get('/projects/:project_alias', array($this, 'GET_projectsIndex'));
        $this->get('/', array($this, 'GET_index'));
    }

    public function GET_index()
    {
        $projects = $this->dm('Project')->all();

        return $this->render('index.twig', array(
            'projects' => $projects,
        ));
    }

    public function GET_projectsIndex($projectAlias)
    {
        $project = $this->dm('Project')->first(array('alias' => $projectAlias));

        return $this->render('projects/index.twig', array(
            'project' => $project,
        ));
    }

    public function render($file, $variables = array())
    {
        $this->response->write($this['twig']->render($file, $variables));
    }

    private function dm($name)
    {
        if (array_key_exists($name, $this->dataMappers) === false) {
            $klass = "Yuyat_WebPhacilitator_DataMapper_{$name}Mapper";
            $this->dataMappers[$name] = new $klass($this['dm.adapter']);
        }

        return $this->dataMappers[$name];
    }
}
