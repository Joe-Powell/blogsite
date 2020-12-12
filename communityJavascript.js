//  Handle Community 

const submitCommentBtn = document.querySelector('.submitCommentBtn');
const comment = document.querySelector('.comment');
const form = document.querySelector('#Form');
const commentContainer = document.querySelector('.commentContainer');
const commentsContainerAll = document.querySelector('.commentsContainerAll');



submitCommentBtn.addEventListener('click', (e) => {

    // because we are sending to php, we do these next 2 lines below, easy
    console.log('clicked COMMENT SUBMISSSION');
    let data = new FormData();
    data.append('comment', form.comment.value);
    data.append('userid', form.userid.value);
    if (form.comment.value !== '') {

        //e.preventDefault() //when testing I used this...

        fetch('./community.php', {
            method: 'POST',
            body: data
        })
            .then(res => { res.json() })
            .then(theRes => { console.log(theRes) })








    } else {
        e.preventDefault()
        alert("Please Fill All Required Field");
    }

})


////////////////EDIT BUTTON //////////////////////////////////////////

const editCommBtn = document.querySelectorAll('.editCommBtn');
const commEditForm = document.querySelectorAll('#commEditForm')
const exitIcon = document.querySelectorAll('.fa-times-circle')
const updateInputField = document.querySelectorAll('.updateInputField')
for (let i = 0; i < editCommBtn.length; i++) {
    editCommBtn[i].addEventListener('click', () => {
        commEditForm[i].classList.toggle('toggleForm');
        updateInputField[i].focus();
    })

    exitIcon[i].addEventListener('click', () => {
        commEditForm[i].classList.toggle('toggleForm');
    })
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////








