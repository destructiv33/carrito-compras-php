	

document.addEventListener('DOMContentLoaded', event =>{
   /* const cookie = document.cookie.split(';');
    let cookie = null;
    cookie.forEach(item =>{
        if (item.indexOf('items') > -1) {
            cookie = item;
        }
    });
    if (cookie != null) {
        const count = cookie.split('=')[1];
        console.log(count);
        document.querySelector('.btn-carrito').innerHTML = `(${count}) Carrito<span class="icon-basket"></span>`;
    }*/
});

const bCarrito = document.querySelector('.btn-carrito');

bCarrito.addEventListener('click', event => {
    const carritoContainer=document.querySelector('#carrito-container');
    
    if(carritoContainer.style.display == ''){
        carritoContainer.style.display = 'block';
        actualizarCarritoUI();
    }else{
        carritoContainer.style.display = '';
    }
});
function actualizarCarritoUI() {
    fetch('http://localhost/sistema/Apis/carrito/api-carrito.php?action=mostrar')
    .then(response => response.json())
    .then(data => {
        console.log(data);
        let tablaCont = document.querySelector('#tabla');
        let precioTotal='';
        let html = '';
        
        data.items.forEach(element => {
            html+=`
            <div class="fila">
                <div class="imgen">
                    <img src=".${element.img}" width='90'>
                </div>
                <div class="info">
                    <input type="hidden" name="id_p" id="id" value='${element.id_prod}' />
                    <div class="nombre">${element.nombre}</div>
                    <div>${element.cantidad} producto de $${element.precio_u}</div>
                    <div>Sub-total $${element.subtotal}</div>
                    <div class='botones'><button class="btn-remove">Eliminar del carrito</button></div>
                </div>
            </div>
            `;
        });
        precioTotal = `<p>Total: $${data.info.total}</p> <a href="http://localhost/sistema/carrito.php">Ver Carrito</a>`;               
        
        tablaCont.innerHTML = precioTotal + html;
        document.cookie = `items=${data.info.count}`;
        bCarrito.innerHTML = `(${data.info.count}) Carrito<span class="icon-basket"></span>`;
        document.querySelectorAll('.btn-remove').forEach(boton => {
            boton.addEventListener('click', e =>{
                const id = boton.parentElement.parentElement.children[0].value;
                removeItemFromCarrito(id);
            });
        });
    });

}
const botones = document.querySelectorAll('.btn-add');
botones.forEach(boton => {
    const id=boton.parentElement.parentElement.children[0].value;
    boton.addEventListener('click', e =>{
        addFromToCarrito(id);
        console.log('id: '+id);
    });
});
function removeItemFromCarrito(id) {
    fetch('http://localhost/sistema/Apis/carrito/api-carrito.php?action=remove&&id='+id)
    .then(response => response. json())
    .then(data =>{
        actualizarCarritoUI();
    });
}
function addFromToCarrito(id) {
    fetch('http://localhost/sistema/Apis/carrito/api-carrito.php?action=add&&id='+id)
    .then(response => response. json())
    .then(data =>{
        actualizarCarritoUI();
    });
}