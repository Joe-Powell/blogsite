//  Handle Community form   /////////////////////////////////////////////////////////////////////////////////

const submitComment = document.querySelector('.submitComment');
const comment = document.querySelector('.comment');
const form = document.querySelector('#Form');
const commentContainer = document.querySelector('.commentContainer');
const commentsContainerAll = document.querySelector('.commentsContainerAll');



submitComment.addEventListener('click', (e) => {

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


const editCommBtn = document.querySelectorAll('.editCommBtn');
const commEditForm = document.querySelectorAll('#commEditForm')
const exitIcon = document.querySelectorAll('.fa-times-circle')
for (let i = 0; i < editCommBtn.length; i++) {
    editCommBtn[i].addEventListener('click', () => {
        commEditForm[i].classList.toggle('toggleForm');
    })

    exitIcon[i].addEventListener('click', () => {
        commEditForm[i].classList.toggle('toggleForm');
    })
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////








