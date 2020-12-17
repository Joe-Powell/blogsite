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

        // fetch('./community.php', {
        //     method: 'POST',
        //     body: data
        // })
        //     .then(res => { res.json() })
        //     .then(theRes => { console.log(theRes) })

    } else {
        e.preventDefault()
        alert("Please Fill All Required Fields");
    }

})


////////////////EDIT BUTTON //////////////////////////////////////////

const editCommBtn = document.querySelectorAll('.editCommBtn');
const commEditForm = document.querySelectorAll('#commEditForm');
const updateInputField = document.querySelectorAll('.updateInputField');





for (let i = 0; i < editCommBtn.length; i++) {



    editCommBtn[i].addEventListener('click', () => {
        commEditForm[i].classList.toggle('toggleForm');
        updateInputField[i].focus();
    })


}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////







///////////////////////UPDATE POST FROM COMMUNITY.PHP//////////////////////////////////////////
// STill need for form validation so wont submit and also gives an alert..... too slow with fetch 

const submitUpdateBtn = document.querySelectorAll('.submitUpdateBtn');
//const commEditForm = document.querySelectorAll('.commEditForm');  already declaired

for (let i = 0; i < submitUpdateBtn.length; i++) {
    submitUpdateBtn[i].addEventListener('click', (e) => {

        let data = new FormData();
        data.append('updateValue', commEditForm[i].update.value);
        data.append('thePostIdToUpdate', commEditForm[i].thePostIdToUpdate.value);
        if (commEditForm[i].update.value !== '') {

            // fetch('./community.php', {
            //     method: 'POST',
            //     body: data
            // })
            //     .then(res => { res.json() })
            //     .then(theRes => { console.log(theRes) })

        } else {
            e.preventDefault()
            alert("Please Fill All Required Fields");
        }

    })


}

//////////////////////////////////////////////////////////////////////////////////////////////////





///HANDLE DELETE.  WHEN YOU CLICK ON DELETE BUTTON/////////////////////////////

const deletePostBtn = document.querySelectorAll('.deletePostBtn');

for (let i = 0; i < deletePostBtn.length; i++) {
    deletePostBtn[i].addEventListener('click', () => {
        let data = new FormData();
        data.append('deleteThisPostId', commEditForm[i].thePostIdToUpdate.value);

        // fetch('./community.php', {
        //     method: 'POST',              NOT USING TOO SLOW
        //     body: data
        // })

    })

}

