// import 'https://smtpjs.com/v3/smtp.js'

const host = window.location.origin
console.log(host)

const siteKey = "6LdE_CApAAAAAOfnt67beS1GXks4h33huKAbXlAL"
const secret = "6LdE_CApAAAAAAA9wfyAwITycNUZKXGgNTGB6DKl"


const form = document.getElementById('contact-form')
const formPartener = document.getElementById('partener-form')
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
        fetch(host+'/api/send_mail',data)
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


formPartener && formPartener.addEventListener('submit', (e)=>{
    e.preventDefault();
    // console.log(120)
    
    
    const ecole = {
        nom: document.getElementById('nom-ecole').value,
        maternelle: document.getElementById('maternelle').checked,
        primaire: document.getElementById('primaire').checked,
        secondaire: document.getElementById('secondaire').checked,
        itm: document.getElementById('itm').checked,
        mail: document.getElementById('mail').value,
        telephone: document.getElementById('telephone').value,
        adresse: document.getElementById('adresse').value,
    };

    const formData = new FormData();
    formData.append('nom', ecole.nom)
    formData.append('maternelle', ecole.maternelle)
    formData.append('primaire', ecole.primaire)
    formData.append('secondaire', ecole.secondaire)
    formData.append('itm', ecole.itm)
    formData.append('mail', ecole.mail)
    formData.append('telephone', ecole.telephone)
    formData.append('adresse', ecole.adresse)
    formData.append('recever', 'contact@easychik.com')
    
    const data = {
        method: "POST",
        headers: new Headers(),
        mode: "cors",
        cache: "no-cache",
        body: formData,
        
    }
    
    const clearForms = () => {
        document.getElementById('nom-ecole').value = ''
        document.getElementById('maternelle').checked = false
        document.getElementById('primaire').checked = false
        document.getElementById('secondaire').checked = false
        document.getElementById('itm').checked = false
        document.getElementById('mail').value = ''
        document.getElementById('telephone').value = ''
        document.getElementById('adresse').value = ''
    }
    
    console.log(ecole);
    try {
        document.getElementById('loader').style.display = "flex"
        fetch(host+'/api/store_ecole',data)
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
                    console.log(res)
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