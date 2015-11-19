function FormataMoeda(w,e,m,r,a){    
    // Cancela se o evento for Backspace
    if (!e) var e = window.event
    if (e.keyCode) code = e.keyCode;
    else if (e.which) code = e.which;
    // Vari�veis da fun��o
    var txt  = (!r) ? w.value.replace(/[^\d]+/gi,'') : w.value.replace(/[^\d]+/gi,'').reverse();
    var mask = (!r) ? m : m.reverse();
    var pre  = (a ) ? a.pre : "";
    var pos  = (a ) ? a.pos : "";
    var ret  = "";    
    if(code == 9 || code == 8 || txt.length == mask.replace(/[^#]+/g,'').length) return false;
    // Loop na m�scara para aplicar os caracteres
    for(var x=0,y=0, z=mask.length;x<z && y<txt.length;){
        if(mask.charAt(x)!='#'){
            ret += mask.charAt(x);
            x++;
        } 
        else {
            ret += txt.charAt(y);
            y++;
            x++;
        }
    }
// Retorno da fun��o
ret = (!r) ? ret : ret.reverse()	
w.value = pre+ret+pos;
}
// Novo m�todo para o objeto 'String'
String.prototype.reverse = function(){
    return this.split('').reverse().join('');
};


//FUNÇÕES DO JQUERY

$(function() {
    $( "#accordion" ).accordion();
    
    $( "input, textarea, select" ).addClass( "ui-corner-all ui-widget-content " );        
    
    $(".tip").tooltip();
    
    $( ".botao" ).button();     

    $(".sair").button({
      icons: {
        primary: "ui-icon-closethick"
      },
      text: false
    })
    
    $(".editar").button({
      icons: {
        primary: "ui-icon-pencil"
      },
      text: false
    })
    
    $(".excluir").button({
      icons: {
        primary: "ui-icon-closethick"
      },
      text: false
    })
});
  
function Ocultar(id,acao){    
    if(acao==='D'){
        $( "#"+id ).removeClass( "ocultar" );
        $( "#"+id ).fadeIn(100); 
    }else{
        $( "#"+id ).addClass( "ocultar" );
        $( "#"+id ).fadeOut(100); 
    }
}