var tbody = document.querySelector("tbody");

$.ajax({
  headers: { "X-Auth-Token": "1737f923086d413e92ad62f9f4e37e52" },
  url: "https://api.football-data.org/v2/competitions/PL/standings",
  dataType: "json",
  type: "GET"
}).done(function(response) {
  for (let i = 1; i < 21; i++) {
    var column = document.createElement("tr");
    tbody.appendChild(column);
    for (let j = 0; j < 3; j++) {
      if (j == 0) {
        var el_column_position = document.createElement("td");
        el_column_position.innerHTML =
          response.standings[0].table[i - 1].position;
        column.appendChild(el_column_position);
      } else if (j == 1) {
        var el_column_club = document.createElement("td");
        el_column_club.innerHTML = response.standings[0].table[i - 1].team.name;
        column.appendChild(el_column_club);
      } else if (j == 2) {
        var el_column_points = document.createElement("td");
        el_column_points.innerHTML = response.standings[0].table[i - 1].points;
        column.appendChild(el_column_points);
      }
    }
  }
});
