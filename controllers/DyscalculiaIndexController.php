<?php

defined('EXECG__') or die('<h1>404 - <strong>Not Found</strong></h1>');

class DyscalculiaIndexController extends ControllerBase
{

    public function main()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'dyscalculiaIndex');
        $this->document->addScript("test");
        $this->document->addScript("font-awesome");
        $this->document->addCss('indexStyle');
        $this->document->addCss('orden');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addCss('dyscaulculiaCss' . DS . 'operationalTestsStyle');
        $this->document->addCss('dyscaulculiaCss' . DS . 'PractognosticTestsStyle');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Validations');
        $this->document->addScript("jquery.mousewheel-3.0.4.pack");
        $this->document->addScript("jquery.fancybox-1.3.4.pack");
        $this->document->addScript("jquery.dataTables");
        $this->document->addCss("jquery.fancybox-1.3.4");
        $this->document->setHeader();
        $this->getModel("Cuestionario");
        $cuestionarios = $this->model->getCuestionarios();
        $this->view->setVars('cuestionarios', $cuestionarios);
        $this->view->show();
    }

    public function saveAnswer()
    {
        $this->getModel("User");

        $idUser = $this->model->getUserId();  
        
        if (isset($_POST['data'])) {
            $datos = $_POST['data'];
            $this->getModel("Cuestionario");
            $res = $this->model->addAnswers($datos, $idUser);
            echo json_encode($res);
        } else {
            echo json_encode("Error: No es un método POST");
        }
    }

    public function testResult()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'result');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    public function ValidateInitialTest()
    {
        $this->getModel("User");
        $idUser = $this->model->getUserId();
        $user = $this->model->getUserById($idUser);
        if ($user != false) {

            $birthDate = $user['fechacumple'];

            $birthDateYear = date("Y", strtotime($birthDate));

            $today = getdate();

            $todayYear = $today['year'];

            $finalDate = $todayYear - $birthDateYear;

            if ($finalDate > 9 || $finalDate < 6) {
                echo "La edad del usuario no es válida";
                return;
            }

            if ($finalDate == 6) {
                $this->Ideognostic16();
            } elseif ($finalDate == 7) {
                
            }elseif ($finalDate == 8) {
                
            }elseif ($finalDate == 9) {
                
            }
        }
    }

    //Seis años

    public function Ideognostic16()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'IdeognosticTest1_6y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Validations');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    public function Ideognostic26()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'IdeognosticTest2_6y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Validations');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    public function Lexical16()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'LexicalTest1_6y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Validations');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    public function Lexical26()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'LexicalTest2_6y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Validations');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    public function Operational16()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'OperationalTest1_6y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addCss('dyscaulculiaCss' . DS . 'operationalTestsStyle');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Validations');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    public function Operational26()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'OperationalTest2_6y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addCss('dyscaulculiaCss' . DS . 'operationalTestsStyle');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Validations');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    public function Practognostic16()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'PractognosticTest1_6y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addCss('dyscaulculiaCss' . DS . 'PractognosticTestsStyle');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Validations');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    public function Verbal16()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'VerbalTest1_6y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Validations');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    //Siete años

    public function Ideognostic17()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'IdeognosticTest1_7y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    //Llamar a Ideognostic267

    public function Lexical178()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'LexicalTest1_7_8y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    public function Lexical27()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'LexicalTest2_7y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    //Ocho años

    public function Ideognostic18()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'IdeognosticTest1_8y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    public function Ideognostic28()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'IdeognosticTest2_8y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    //Llamar a Ideognostic267

    public function Lexical28()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'LexicalTest2_8y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    //Nueve años

    public function Ideognostic19()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'IdeognosticTest1_9y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    public function Ideognostic29()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'IdeognosticTest2_9y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    public function Lexical19()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'LexicalTest1_9y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }

    public function Lexical29()
    {
        $this->view->setTemplate('DyscalculiaViews' . DS . 'LexicalTest2_9y');
        $this->document->addCss('dyscaulculiaCss' . DS . 'discalculia');
        $this->document->addScript('dyscalculiaScripts' . DS . 'Time');
        $this->document->setHeader();
        $this->getModel("TestDiscalculia");
        $this->view->show();
    }
}
