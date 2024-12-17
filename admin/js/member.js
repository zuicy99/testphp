document.addEventListener("DOMContentLoaded",()=>{

    const btn_member_edit = document.querySelector('#member_edit');
    btn_member_edit.addEventListener('click',()=>{
        // const id = document.querySelector('#f_id').value;
     
        const id = document.querySelector('#idx').value;
        alert(id);
    });


    const btn_member_delete = document.querySelector('#member_delete');
    btn_member_delete.addEventListener('click',()=>{
        // const id = document.querySelector('#f_id').value;
        alert("삭제");
    });


});


