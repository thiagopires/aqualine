<?php

// ------------------------------------------------------------------------

/**
 * EchoPre
*/
if ( ! function_exists('echoPre'))
{
    function echoPre($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}

// ------------------------------------------------------------------------

/**
 * Asset URL
 */
if ( ! function_exists('asset_url'))
{
	function asset_url(){
	   return base_url().'assets/';
	}
}

// ------------------------------------------------------------------------

/**
 * Calling CSS
*/

if ( ! function_exists('css'))
{
	function css(){
		return '
    <!-- CSS -->
    <link href="'.asset_url().'css/bootstrap.min.css" rel="stylesheet">
    <link href="'.asset_url().'css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="'.asset_url().'css/heroic-features.css" rel="stylesheet">
    <link href="'.asset_url().'css/context.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		';
	}
}

// ------------------------------------------------------------------------

/**
 * Calling JS
*/

if ( ! function_exists('js'))
{
	function js(){
		return '
	<!-- JS -->

    <script src="'.asset_url().'js/jquery.js"></script>
    <script src="'.asset_url().'js/moment-with-locales.js"></script>
    <script src="'.asset_url().'js/bootstrap.min.js"></script>
    <script src="'.asset_url().'js/bootstrap-datetimepicker.min.js"></script>
    <script src="'.asset_url().'js/context.js"></script>

    <!-- end JS -->
    	';
   	}
}

// ------------------------------------------------------------------------

/**
 * HTML header
*/

if ( ! function_exists('html_header'))
{
	function html_header($title=""){
		return '
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>'.$title.'</title>
    '.css().'
</head>
<body>
    <div class="container">
';
	}
}

// ------------------------------------------------------------------------

/**
 * HTML footer
*/

if ( ! function_exists('html_footer'))
{
	function html_footer(){
		return '
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Thiago Pires, 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
    
    '.js().'
</body>
</html>
		';
	}
}

// ------------------------------------------------------------------------

/**
 * NAV
*/

if ( ! function_exists('nav'))
{
	function nav(){
		return '
<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <!--button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button-->
                <a class="navbar-brand" href="#">Aqualine</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Cadastros 
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="'.site_url().'/imobiliaria/index">Imobiliárias</a>
                            </li>
                            <li>
                                <a href="'.site_url().'/condominio/index">Condomínios</a>
                            </li>
                            <li>
                                <a href="'.site_url().'/orcamento/index">Orçamentos/Serviços</a>
                            </li>
                        </ul>
                    </li>
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Tabelas 
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="'.site_url().'/tiposervico/index">Tipos de serviço</a>
                            </li>
                            <li>
                                <a href="'.site_url().'/usuario/index">Usuários</a>
                            </li>
                        </ul>
                    </li>    
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Funções 
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Contatos</a>
                            </li>
                            <li>
                                <a href="#">Anexos</a>
                            </li>
                        </ul>
                    </li> 
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="disabled"> 
                        <a href="#">Olá, '.$_SESSION['logged_in']['nome'].'</a>
                    </li>
                    <li>
                        <a href="'.site_url().'/home/logout">Sair</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
		';
	}
}

// ------------------------------------------------------------------------

/**
 * REGEXP
**/

if ( ! function_exists('regexp'))
{
    function regexp($texto){
        // matriz de entrada
        $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç',' ','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º','.' );

        // matriz de saída
        $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','','','','','','','','','','','','','','','','','','','','','','','','' );

        // devolver a string
        return str_replace($what, $by, $texto);
    }
}

// ---

if ( ! function_exists('truncate_chars'))
{
    function truncate_chars($text, $limit, $ellipsis = '...') {
        if( strlen($text) > $limit ) 
            $text = trim(substr($text, 0, $limit)) . $ellipsis; 
        return $text;
    }
}

// ---

if ( ! function_exists('data_br'))
{
    function data_br($data) {
        return date('d/m/Y', strtotime($data));
    }
}

// ---

if ( ! function_exists('money_br'))
{
    function money_br($valor) {
        return "R$ ".number_format($valor, 2);
    }
}
