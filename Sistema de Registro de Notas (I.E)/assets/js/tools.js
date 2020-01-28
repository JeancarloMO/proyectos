function selectComboByText(id, texto){
    var eid = document.getElementById(id);
    for (var i = 0; i < eid.options.length; ++i) {
        if (eid.options[i].text === texto){
            eid.options[i].selected = true;
            break;
        }
    }
}

/*
onclick="mojarra.jsfcljs(document.getElementById('Frm'),{'j_idt72':'j_idt72'},'');return false"

//ELIMINA LOS IMPUTS CREADOS
mojarra.dpf=function dpf(c){
    var b=c.adp;
    if(b!==null){for(var a=0;a<b.length;a++){
        c.removeChild(b[a])
    }}};

//CREA LOS IMPUTS
//E -> document.getElementById('Frm')
//C -> 'j_idt72':'j_idt72'
mojarra.apf=function apf(e,c){
    var d=new Array();
    e.adp=d;
    var b=0;
    //recorre en la cadena cada caracter
    for(var a in c){
        if(c.hasOwnProperty(a)){
            var g=document.createElement("input");
            g.type="hidden";
            g.name=a;
            g.value=c[a];
            e.appendChild(g);
            d[b++]=g
        }
    }
};

//EXPORTAR EXCEL
//C -> document.getElementById('Frm')
//B -> 'j_idt72':'j_idt72'
//A -> ''
mojarra.jsfcljs=function jsfcljs(c,b,a){
    mojarra.apf(c,b);
    var d=c.target;
    if(a){
        c.target=a
    }
        c.submit();
        c.target=d;
        mojarra.dpf(c)
};


mojarra.jsfcbk=function jsfcbk(b,a,c){return b.call(a,c)};
mojarra.ab=function ab(c,d,g,a,b,f){if(!f){f={}}if(g){f["javax.faces.behavior.event"]=g}if(a){f.execute=a}if(b){f.render=b}jsf.ajax.request(c,d,f)};*/