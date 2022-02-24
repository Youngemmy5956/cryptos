// mobile view menubar codes 

function OpenMenubar(){
    const menuList=document.getElementById('menu-items');
    menuList.style.width='100vw';
}
function CloseSideBar(){
    const menuList=document.getElementById('menu-items');
    menuList.style.width='0px';
}
const menu=document.getElementById('menubar');  
menu.addEventListener('click',OpenMenubar);
const sidebar=document.getElementById('close-sidebar');  
sidebar.addEventListener('click',CloseSideBar);

// appear on scroll effect 

// function scrollApear(){

//     var text=document.getElementById('text');
    
//     var textPosition=text.getBoundingClientRect().top;
    
//     var screenPosition=window.innerHeight;
    
//         if(textPosition > screenPosition/2){
//             text.classList.add('animation');
//         }
//         else{
//             text.classList.remove('animation');
//         }
//     }
    
//     window.addEventListener('scroll',scrollApear);

    // login modal codes 

    let modal=document.getElementById('modal-pop-up');
    function Login(){ 
        modal.style.marginTop='0px';
    };

    let loginBtn=document.getElementById('loginBtn');
loginBtn.addEventListener('click',Login);

    function closeModal(){    
        modal.style.marginTop='100000px';    
    };
    
let closeModalBtn=document.getElementById('close-modal');
closeModalBtn.addEventListener('click',closeModal);

// register modal code 

let registerModal=document.getElementById('register-pop-up');
    function Register(){ 
        registerModal.style.marginTop='0px';
    };

    let registerBtn=document.getElementById('registerBtn');
registerBtn.addEventListener('click',Register);

    function closeRegisterModal(){    
        registerModal.style.marginTop='100000px';    
    };
    
let closeregisterModalBtn=document.getElementById('close-register-modal');
closeregisterModalBtn.addEventListener('click',closeRegisterModal);

