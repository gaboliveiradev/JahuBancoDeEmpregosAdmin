<?php
namespace App\Controller;

use App\Model\QualificacaoModel;

class QualificacaoController extends Controller {

	public static function getById() 
	{
		parent::isAuthenticated();

		$model = new QualificacaoModel();
		parent::setResponseAsJSONInArray($model->getQualificacaoById( (int) $_GET['id'] ));
	}
}
