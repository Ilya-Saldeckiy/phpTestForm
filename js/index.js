document.addEventListener('DOMContentLoaded', function() {

    let registerCard = document.querySelector('.block__register')

    registerCard.addEventListener('click', function(event){
        registerCard.classList.add('block__register__active')
    })

    document.onclick = function() {
        if(document.getElementById('back') !== document.querySelector('.block__register')){
            document.getElementById('back').classList.toggle("open__back")
        }
    }


})


document.addEventListener('DOMContentLoaded', function() {

    let signIn = document.querySelector(".block__sign-in")

    signIn.addEventListener('click', function(event){
        signIn.classList.add('block__register__active')
    })
})
