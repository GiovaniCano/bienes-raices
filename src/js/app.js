'use strict'

document.addEventListener('DOMContentLoaded', () => {
    darkMode()
    mobileMenu()
    aditionalFields_contactForm()
    removeAlerts()
    textareaValidation()
    xToCloseAlerts()
})

function darkMode() {
    const icon = document.querySelector('.dark-mode-icon')

    checkDarkmode()

    icon.onclick = () => {
        if(sessionStorage.getItem('dark-mode') === 'true') {
            sessionStorage.setItem('dark-mode', 'false')
        } else {
            sessionStorage.setItem('dark-mode', 'true')
        }

        checkDarkmode()
        textareaValidation()
    }

    function checkDarkmode() {
        if(sessionStorage.getItem('dark-mode') === 'true') {
            document.body.classList.add('dark-mode')
        } else {
            document.body.classList.remove('dark-mode')
        }
    }
}

function mobileMenu() {
    const icon = document.querySelector('.mobile-menu')
    icon.onclick = () => {
        const nav = document.querySelector('.nav-header')
        nav.classList.toggle('show-menu')
    }
}

function aditionalFields_contactForm() {
    const contactType = document.querySelectorAll('input[name="contacto"]')
    contactType.forEach(input => {
        input.onclick = e => {
            const contactDiv = document.querySelector('#contactType')
            if(e.target.value === 'telefono') {
                contactDiv.innerHTML = `
                    <label for="telefono">Teléfono:</label>
                    <input id="telefono" type="tel" placeholder="Tu Teléfono" name="telefono" required>
                    
                    <p>Elija la fecha y la hora para la llamada:</p>

                    <label for="fecha">Fecha:</label>
                    <input id="fecha" type="date" name="fecha">

                    <label for="hora">Hora:</label>
                    <input id="hora" type="time" min="09:00" max="18:00" name="hora">
                `
            } else {
                contactDiv.innerHTML = `
                    <label for="email">E-mail:</label>
                    <input id="email" type="email" placeholder="Tu Email" name="email" required>
                `
            }
        }
    })  
}

function removeAlerts() {
    const alerts = document.querySelectorAll('.alert')
    if(alerts) {
        alerts.forEach(alert => {
            let time
            if(alert.classList.contains('user-logued')) {
                time = 6000
            } else {
                time = 5000
            }
            
            setTimeout(() => {
                alert.remove()                
            }, time);
        });
    }
}

function textareaValidation() {
    const textarea = document.querySelector('textarea.min50char')
    if(textarea) {
        let p = document.querySelector('.textareaValid')
        if(!p) {
            p = document.createElement('P')
            p.classList.add('textareaValid')
            p.style.marginTop = '-20px'
            textarea.parentNode.insertBefore(p, textarea.nextSibling)
        }

        const requiredChars = 50
        let currentChars = textarea.value.trim().length
        styleColor()

        p.textContent = `${currentChars} de ${requiredChars} caracteres necesarios.`
        textarea.oninput = e => {
            currentChars = e.target.value.trim().length
            p.textContent = `${currentChars} de ${requiredChars} caracteres necesarios.`
            styleColor()
        }
        
        function styleColor() {
            if(currentChars === 0) {
                if(document.body.classList.contains('dark-mode')) {
                    p.style.color = 'white'
                } else {                    
                    p.style.color = 'black'
                }
            } else if(currentChars < 50) {              
                p.style.color = 'red'
            } else if(currentChars >= 50) {
                p.style.color = 'green'
            }
        }
    }    
}

function xToCloseAlerts() {
    const xs = document.querySelectorAll('.x-close');
    if(xs) {
        xs.forEach(x => {
            x.onclick = () => {
                x.parentNode.remove();
            }
        })
    }
}