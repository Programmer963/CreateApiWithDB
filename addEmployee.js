async function getJson(url) {
    let response = await fetch(url);
    let promise = await response.json();
    return promise;
}

window.onload = (event) => {
    let select = document.querySelector("select#officeId");
    getJson("getEmployees.php").then(employees => {
        employees.forEach(employee => {
            let option = document.createElement("option");
            option.value = employee.employeeId;
            option.innerText = `${employee.employeeId} — ${employee.firstName} ${employee.lastName}`;
            select.append(option);
        });
    });

    let form = document.querySelector("form#form");
    form.onsubmit = (event) => {
        event.preventDefault();
        let formData = new FormData(form);
        let formObj = Object.fromEntries(formData.entries());
        sendForm(form.action, form.method, formObj).then(response => {
            console.log(response);
        })
    }
}

async function sendForm(url, method = "get", formData) {
    let response = await fetch(url, {
        method: method,
        body: JSON.stringify(formData),
        headers: {
            "Content-type": "application/json; charset=utf-8"
        }
    });
    let promise = await response.json();
    return promise;
}

// add.php?name=fff&surname=fghh&password=fgggfrrygg