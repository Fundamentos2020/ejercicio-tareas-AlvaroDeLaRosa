var l;
var c=[];

function take() {
    extTasks(document.getElementById('Categorias').value);
}

function insertI() {
    let list='';
    list+=`
        <option value="0">Todas</option>
    `;
    xhr=new XMLHttpRequest();
    xhr.open('GET', 'http://localhost/ejercicios-php/Aplicacion_DB/Controllers/categoriasController.php', true);
    xhr.onload=function() {
        if(this.status===200) {
            cat=JSON.parse(this.responseText);
            cat.forEach(function(elem) {
                c.push([elem.id, elem.nombre]);
                list+=`
                    <option value="${elem.id}">${elem.nombre}</option>
                `;
            })
            document.getElementById('Categorias').innerHTML=list;
        }
    }
    xhr.send();
    extTasks(0);
    l=document.getElementById('Categorias');
    l.addEventListener('change', take);
}

function extTasks(cat) {
    let list='';
    dir='http://localhost/ejercicios-php/Aplicacion_DB/Controllers/tareasController.php?key='+String(cat);
    xhr=new XMLHttpRequest();
    xhr.open('GET', dir, true);
    xhr.onload=function() {
        if(this.status===200) {
            tar=JSON.parse(this.responseText);
            var fec;
            var nom;
            var des;
            var cn;
            tar.forEach(function(elem) {
                if(elem.categoria_id==null) {
                    cn='';
                }
                else {
                    for(i=0;i<c.length;i++) {
                        if(elem.categoria_id==c[i][0]) {
                            cn=c[i][1];
                        }
                    }
                }
                if(elem.fecha_limite==null) {
                    fec='';
                }
                else {
                    if(cn=='') {
                        fec=elem.fecha_limite;
                    }
                    else {
                        fec='- '+elem.fecha_limite;
                    }
                }
                if(elem.titulo==null) {
                    nom='';
                }
                else {
                    nom=elem.titulo;
                }
                if(elem.descripcion==null) {
                    des='';
                }
                else {
                    des=elem.descripcion;
                }
                list+=`
                <div class="item">
                    <div class="info">
                        <i>${cn} ${fec}</i>
                    </div>
                    <h2>${nom}</h2>
                    ${des}
                </div>
                `;
            })
            document.getElementById('container').innerHTML=list;
        }
    }
    xhr.send();
}