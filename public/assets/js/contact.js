// import 'https://smtpjs.com/v3/smtp.js'

const form = document.getElementById('contact-form')
const btnSubmitForm = document.getElementById('submit-form')
// form && console.log(form)
form && form.addEventListener('submit', (e)=>{
    e.preventDefault();
    // console.log(120)
    document.getElementById('loader').style.display = "flex"


    const mail = {
        from: document.getElementById('sender-email').value,
        name: document.getElementById('sender-name').value,
        message: document.getElementById('sender-message').value,
        telephone: document.getElementById('sender-telephone').value,
    };


    // console.log(mail);

    const formData = new FormData();
    formData.append('message', mail.message)
    // formData.append('sendMailToEasyChik', 'true')
    formData.append('subject', 'Contact Easychik')
    formData.append('sender', mail.from)
    formData.append('name', mail.name)
    formData.append('telephone', mail.telephone)
    formData.append('recever', 'contact@easychik.com')

    const data = {
        method: "POST",
        headers: new Headers(),
        mode: "cors",
        cache: "no-cache",
        body: formData,
        
    }

    const clearForms = () => {
        document.getElementById('sender-email').value = ''
        document.getElementById('sender-name').value = ''
        document.getElementById('sender-message').value = ''
        document.getElementById('sender-telephone').value = ''
    }

     console.log();
    try {
        fetch('http://localhost:5000/api/send_mail',data)
            .then(res => {
                return res.json()
            })
            .then(res => {
                if(res === 'success'){
                    alert('Votre Message a été envoyé avec success, ✅')
                    document.getElementById('loader').style.display = "none"
                    clearForms()
                }else{
                    alert('⚠️ Oups, une erreur s\'ait produite, Veuillez verifier votre connexion Internet')
                    document.getElementById('loader').style.display = "none"
                }
            })
            .catch(err => {
                alert('⚠️ Oups, une erreur s\'ait produite, Veuillez verifier votre connexion Internet')
                document.getElementById('loader').style.display = "none"
                console.log(err)
            })
        
    } catch (error) {
        console.log(error)
        document.getElementById('loader').style.display = "none"
    }
})