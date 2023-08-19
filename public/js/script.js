
// task add 

taskAdd()
function taskAdd() {

    let contactForm = document.getElementById('contactForm');
    let task = document.getElementById('task').value;

    contactForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        let task = document.getElementById('task').value;
        task = task.trim()
        if (task.length === 0) {
            alert("You can't update Empty")
            window.location = "/"

        } else {

            let data = {
                "name": task,
                "value": "unchecked"
            }
            let url = "/task-add"
            let added = await axios.post(url, data);
            contactForm.reset();
            window.location = "/"
        }
    })
}


// get task 
getTask()
async function getTask() {


    let url = '/get-task'
    let allData = await axios.get(url);
    allData.data.forEach((item) => {

        let allTask = document.getElementById('allTask').innerHTML +=
            `
          <li class="list-group-item" id="${item['id'] + "list"}">
          <input class="form-check-input me-1 p-3 mt-3" type="checkbox" ${item['value']} id="${item['id']}ckBox">
          <label class="form-check-label col-lg-10 col-sm-8 fs-1 ps-3" id="${item['id']}label" onClick="doneTaskTwo(${item['id']})" for="${item['id']}ckBox">${item['name']}</label>
          <button class="btn btn-primary mb-3" type="button" data-bs-toggle="modal" data-bs-target="#${item['id']}+model"><i class="bi bi-pencil-square"></i></button>
          <!-- Modal -->
          <div class="modal fade" id="${item['id']}+model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Task</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
      <div class="modal-body">
      <input class="updateTask form-control w-100 my-2  rounded-5" type="text" value="${item['name']}" id="${item['id']}updateTask">
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit"  onClick="updateTask('${item['id']}')" data-bs-dismiss="modal" class="btn btn-primary">Update</button>
      </div>
      </div>
      </div>
      </div>
      <button class=" btn btn-danger mb-3" id="${item['id']}trash" onClick="deleteTask('${item['id']}')" ><i class="bi bi-trash"></i></button>
      </li>

      `
    })

}

// update task 
function updateTask(id) {
    let updateValue = document.getElementById(id + "updateTask").value;
    let mainTask = document.getElementById(id + "label").innerHTML = updateValue
    console.log((updateValue));
    try {
        updateValue = updateValue.trim()
        if (updateValue.length === 0) {
            alert("You can't update Empty")
            window.location = "/"

        } else {

            let url = '/update-task/' + id;
            let data = {
                'name': updateValue
            }
            axios.put(url, data);
            // toast 
            toastMsg("Task Update Successfully")
        }
    } catch (error) {
        alert("Something went wrong")

        console.error("Error Update task:", error);
    }
}

// ckBox update 


function doneTaskTwo(id) {
    // let ckBoxLabel = document.getElementById(id + "label");
    let ckBoxInput = document.getElementById(id + "ckBox");
    ckBoxInput.addEventListener('click', () => {
        console.log(ckBoxInput);
        if (ckBoxInput.checked) {
            let url = "/done-task/" + id;
            let data = {
                'value': "checked"
            }
            axios.put(url, data);

            // toast 
            toastMsg("Task Done")
        }
        else {
            let url = "/done-task/" + id;
            let data = {
                'value': "unchecked"
            }

            // toast 
            toastMsg("Task Unchecked")
            axios.put(url, data);
        }
    })
}


// delete task 
async function deleteTask(taskId) {
    let deleteUrl = '/delete-task/' + taskId;

    try {
        await axios.delete(deleteUrl);
        // toast 
        toastMsg("Task Delete Successfully")
        let list = document.getElementById(taskId + "list");
        if (list) {
            list.remove();
        }
    } catch (error) {
        console.error("Error deleting task:", error);
    }
}





// for toast 


function toastMsg(Msg) {
    let myToast = document.getElementById("MYtoast");
    let toastMsg = document.getElementById("toastMsg");
    myToast.classList.remove("d-none");
    toastMsg.innerHTML = Msg

    timeOut()
}
function hideToast() {
    let myToast = document.getElementById("MYtoast");
    myToast.classList.add("d-none");

}
function timeOut() {
    setTimeout(hideToast, 5000)
}
