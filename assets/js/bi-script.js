/**
 * Created by Strauss on 2016/07/26.
 */
 
var born_light, born_ordernw, born_callbox , born_callnw;


born_callbox = document.getElementById("callbox");
born_callnw = document.getElementById("callme_icon");
born_light = document.getElementById("orderbox");
born_ordernw = document.getElementById("ordernw");

if(born_ordernw !== null){
    born_ordernw .addEventListener("click",function(){orderNow();});
}


born_callbox = document.getElementById("callbox");
born_callnw = document.getElementById("callme_icon");

if(born_callnw !== null){
    born_callnw.addEventListener("click",function(){born_callNow();});
}


function orderNow(){
    born_light.style.display = "block";
	setTimeout(function(){
			born_light.classList.add('show');
	},10);
		let product = document.querySelector('.sku');
		if(product){
			document.getElementById("product").value = product.innerText;
		}
}

function bi_show_popup(e){
    let target = document.getElementById(e.target.closest('.bi-popup-button').getAttribute('target'));
    target.style.display = "block";
    setTimeout(function(){
        target.className = "bi-page-cover show";
    },10);
    let product = document.querySelector('.sku');
    if(product){
        document.querySelectorAll('.product').forEach(p=>p.value = product.innerText)
        document.getElementById("product").value = product.innerText;
    }
}


const bi_close_popup = (e)=>{
    var close = e.target.closest('.bi-page-cover ');
    close.classList.remove('show');
    setTimeout(function(){
        close.style.display = "none";},500);
}

document.querySelectorAll('.bi-close-button').forEach(e=>e.addEventListener('click',bi_close_popup));
document.querySelectorAll('.bi-popup-button').forEach(e=>e.addEventListener('click',bi_show_popup));




if(born_callnw !== null){
    born_callnw.addEventListener("click",function(){born_callNow();});
}

function born_callNow(){
    born_callbox.style.display = "block";
    setTimeout(function(){
        born_callbox.className = "bi-page-cover show";
},10);
    var title = document.getElementById("title").innerHTML;
    document.getElementById("product_call").value = title;
}
