<?php
class Roteador{

    protected $uri = array();
    protected $controlador;
    protected $acao;

    public function __construct(){
        $this->parametros();
    }



    public function parametros(){
        $this->uri = ( isset( $_GET['r'] ) )
            ? explode( '/', $_GET['r'] )
            : array('');
    }



    public function parametro( $key ){
        if( array_key_exists( $key, $this->uri ) ){
            return $this->uri[$key];
        } else {
            return false;
        }
    }



    public function controlador(){
        $this->controlador = ( $this->uri[0] == NULL )
            ? 'index'
            : $this->uri[0] ;
        
        return ( is_string( $this->controlador ) )
            ? $this->controlador
            : 'index';
    }



    public function acao(){

        $this->acao = (
                isset( $this->uri[1] )
                && strlen( $this->uri[1] ) != 0
                && is_string( $this->uri[1] )
            )
            ? $this->uri[1]
            : 'index' ;
        return $this->acao;
    }
}
?>
