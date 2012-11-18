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
        $this->register(new Yuyat_WebPhacilitator_Provider_SessionProvider);

        // Register middlewares
        $this->add(new Slim_Middleware_SessionCookie);

        // Register routing
        $this->get('/projects/:project_alias', array($this, 'GET_projectsIndex'));
        $this->get('/users/:screen_name', array($this, 'GET_usersIndex'));
        $this->get('/', array($this, 'GET_index'));
    }

    public function GET_index()
    {
        $projects = $this['dm']['Project']->all();

        return $this->render('index.twig', array(
            'projects' => $projects,
        ));
    }

    public function GET_projectsIndex($projectAlias)
    {
        $project = $this['dm']['Project']->first(array('alias' => $projectAlias));

        return $this->render('projects/index.twig', array(
            'project' => $project,
        ));
    }

    public function GET_usersIndex($screenName)
    {
        if ($screenName === 'me') {
            $user = $this['session']->getUser();

            if (!$user) {
                $this->halt("You are'nt logged in");
            }
        } else {
            $user = $this['dm']['User']->first(array('screen_name' => $screenName));

            if (!$user) {
                $this->halt('The user is not found');
            }
        }

        return $this->render('users/index.twig', array(
            'user' => $user,
        ));
    }

    public function render($file, $variables = array())
    {
        $variables = array_merge(array(
            'session' => $this['session'],
        ), $variables);

        $this->response->write($this['twig']->render($file, $variables));
    }
}
