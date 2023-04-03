$(document).ready(function () {
  getRestaurants();
  getApiTemp();
  getUsers();
});

function getRestaurants() {
  $.ajax({
    type: "get",
    url: "http://127.0.0.1:8000/api/restaurants",
    // data: "_token = <?php echo csrf_token() ?>",
    success: function (data) {
      // lista restorana
      for (restaurant of data.data) {
        var links = `
          <a class="restaurant_link" href="${restaurant.id}">${restaurant.name}</a><br>
        `;
        $("#restaurants").append(links);
      }
      // paginacija

      var page_link = `
          <li class="page-item"><a class="page-link" href="${data.links.prev}">&larr; Prev</a></li>
          <li class="page-item"><a class="page-link" href="${data.links.next}">Next &rarr;</a></li>
        `;
      $("#pagination").append(page_link);
    },
  });
}
// restaurants pagination
$(document).on("click", ".page-link", function (e) {
  e.preventDefault();
  $("#items").empty();
  url = $(this).attr("href");
  $.ajax({
    type: "get",
    url: url,
    // data: "_token = <?php echo csrf_token() ?>",
    success: function (data) {
      $("#restaurants").empty();
      // lista restorana
      for (restaurant of data.data) {
        var links = `
          <a href="${restaurant.id}" class="restaurant_link">${restaurant.name}</a><br>
        `;
        $("#restaurants").append(links);
      }
      // paginacija

      var page_link = `
          <li class="page-item"><a class="page-link" href="${data.links.prev}">&larr; Prev</a></li>
          <li class="page-item"><a class="page-link" href="${data.links.next}">Next &rarr;</a></li>
        `;
      $("#pagination").empty().append(page_link);
    },
  });
});
// show restaurant items
$(document).on("click", ".restaurant_link", function (e) {
  e.preventDefault();
  $("#items").empty();
  $(this).addClass("color-red").siblings().removeClass("color-red");
  var id = $(this).attr("href");
  $.ajax({
    type: "get",
    url: "http://127.0.0.1:8000/api/restaurants/" + id + "/items",

    success: function (data) {
      for (item of data.data) {
        var items = `
          <div>
            <p>id: ${item.id}</p>
            <p>Name: ${item.name}</p>
            <p>Price: ${item.price}</p>
          </div>
          <br>
        `;
        $("#items").append(items);
      }
    },
  });
});

function getApiTemp() {
  $.ajax({
    url: "https://api.open-meteo.com/v1/forecast?latitude=44.80&longitude=20.47&hourly=temperature_2m,rain&current_weather=true",
    type: "get",

    success: function (data) {
      console.log(data);
      console.log(data.current_weather.temperature);
      temp = data.current_weather.temperature;
      $("#temp").append("<p>Current temperature: " + temp + " &#x2103");
    },
  });
}

function getUsers() {
  $.ajax({
    url: "http://127.0.0.1:8000/api/users",
    type: "get",
    success: function (data) {
      console.log(data);
      for (user of data.data) {
        row = `
        <tr>
          <td>${user.id}</td>
          <td>${user.first_name}</td>
          <td>${user.last_name}</td>
          <td>${user.email}</td>
        </tr>
        `;
        $("#admin_main table tbody").append(row);
      }

      var page_link = `
        <li class="page-item"><a class="page-link" href="${data.links.prev}">&larr; Prev</a></li>
        <li class="page-item"><a class="page-link" href="${data.links.next}">Next &rarr;</a></li>
      `;
      $("#users_pagination").append(page_link);
    },
  });
}

// users pagination
$(document).on("click", ".page-link", function (e) {
  e.preventDefault();
  // $("#users tbody").empty();

  url = $(this).attr("href");

  $.ajax({
    type: "get",
    url: url,
    success: function (data) {
      $("#users tbody").empty();
      for (user of data.data) {
        row = `
        <tr>
          <td>${user.id}</td>
          <td>${user.first_name}</td>
          <td>${user.last_name}</td>
          <td>${user.email}</td>
        </tr>
        `;
        $("#admin_main table tbody").append(row);
      }
      // paginacija

      var page_link = `
          <li class="page-item"><a class="page-link" href="${data.links.prev}">&larr; Prev</a></li>
          <li class="page-item"><a class="page-link" href="${data.links.next}">Next &rarr;</a></li>
        `;
      $("#users_pagination").empty().append(page_link);
    },
    error: function (jqXhr, textStatus, errorMessage) {
      console.log("Error: " + errorMessage);
    },
  });
});

// select row
$(document).on("click", "#users tbody tr", function () {
  $(this).addClass("selected_row").siblings().removeClass("selected_row");
  email = $(this).children().last().text();
  console.log(email);

  validateEmail(email);
});

function validateEmail(email) {
  $.ajax({
    url: "https://open.kickbox.com/v1/disposable/" + email,
    type: "get",
    success: function (data) {
      console.log(data);
      text = `
        ${data.disposable}
      `;
      $("#email_validator b").empty().append(text);
    },
  });
}
