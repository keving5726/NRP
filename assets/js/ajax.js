// FOSJsRoutingBundle
const routes = require('../../web/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

let content = document.getElementById('content');

document.addEventListener('DOMContentLoaded', function (event) {
  new Promise(function (resolve, reject) {
    let url = Routing.generate('admin');
    let xhr = new XMLHttpRequest();

    xhr.open("GET", url);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.addEventListener('load', function (event) {
      if (this.readyState == 4 && this.status == 200) {
        resolve(JSON.parse(this.responseText));
      } else {
        reject(JSON.parse(this.responseText));
      }
    })
    xhr.send();
  })
  .then((response) => {
    let header, table, textNode, inner, index;

    header = document.createElement("h1");
    header.setAttribute("class", "text-center");
    textNode = document.createTextNode("Users");
    header.appendChild(textNode);

    table = document.createElement("table");
    table.setAttribute("class", "table");
    
    inner = "<thead>";
    inner += "<tr>";
    inner += "<th>Id</th>";
    inner += "<th>Identification Card</th>";
    inner += "<th>Roles</th>";
    inner += "<th>Actions</th>";
    inner += "</tr>";
    inner += "</thead>";
    inner += "<tbody>";
    for (index = 0; index < response.length; index++)
    {
      inner += "<tr>";
      inner += "<td>" + response[index].id + "</td>";
      inner += "<td>" + response[index].identificationCard + "</td>";
      inner += "<td>" + response[index].roles + "</td>";
      inner += "<td>";
      inner += "<a class=\"btn btn-primary btn-sm\" href=\"#\">Show</a>";
      inner += "\n";
      inner += "<a class=\"btn btn-primary btn-sm\" href=\"#\">Edit</a>";
      inner += "</td>";
      inner += "</tr>";
    }
    inner += "</tbody>";

    table.innerHTML = inner;

    content.appendChild(header);
    content.appendChild(table);
  })
  .catch((error) => {
    content.children[0].innerHTML = "ERROR";
    console.log(error);
  })
})

document.getElementById('users').addEventListener("click", function (event) {
  event.preventDefault();
  new Promise(function (resolve, reject)
    {
      let url = Routing.generate('admin_user_index');
      let xhr = new XMLHttpRequest();

      xhr.open("GET", url);
      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
      xhr.addEventListener('load', function (event) {
        if (this.readyState == 4 && this.status == 200) {
          resolve(JSON.parse(this.responseText));
        } else {
          reject(JSON.parse(this.responseText));
        }
      })
      xhr.send();
    })
    .then((response) => {
      content.innerHTML = response.response;
    })
    .catch((error) => {
      content.children[0].innerHTML = "ERROR";
      console.log(error);
    })
})

document.getElementById('profiles').addEventListener("click", function (event) {
  event.preventDefault();
  new Promise(function (resolve, reject)
    {
      let url = Routing.generate('admin_profile_index');
      let xhr = new XMLHttpRequest();

      xhr.open("GET", url);
      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
      xhr.addEventListener('load', function (event) {
        if (this.readyState == 4 && this.status == 200) {
          resolve(JSON.parse(this.responseText));
        } else {
          reject(JSON.parse(this.responseText));
        }
      })
      xhr.send();
    })
    .then((response) => {
      content.innerHTML = response.response;
    })
    .catch((error) => {
      tableajax.children[0].innerHTML = "ERROR";
      console.log(error);
    })
})

document.getElementById('pets').addEventListener("click", function (event) {
  event.preventDefault();
  new Promise(function (resolve, reject)
    {
      let url = Routing.generate('admin_pet_index');
      let xhr = new XMLHttpRequest();

      xhr.open("GET", url);
      xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
      xhr.addEventListener('load', function (event) {
        if (this.readyState == 4 && this.status == 200) {
          resolve(JSON.parse(this.responseText));
        } else {
          reject(JSON.parse(this.responseText));
        }
      })
      xhr.send();
    })
    .then((response) => {
      content.innerHTML = response.response;
    })
    .catch((error) => {
      tableajax.children[0].innerHTML = "ERROR";
      console.log(error);
    })
})
