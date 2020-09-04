class Persona {
  constructor() {
    this.table = document.querySelector("#table");
  }

  _listar() {
    // this.table.boo

    $("#table").bootstrapTable({
      //   url: "https://jsonplaceholder.typicode.com/posts",
      url: "ajax/persona.php?op=listar",
      pagination: true,
      search: true,
      columns: [
        {
          field: "userid",
          title: "User",
        },
        {
          field: "id",
          title: "ID",
        },
        {
          field: "title",
          title: "Titulo",
        },
        {
          field: "body",
          title: "Contenido",
        },
        {
          title: "Contenido",
          formatter(value, row, index, field) {
            return `
                <span class="btn btn-warning edit"><i class="fa fa-edit"></i></span>
                <span class="btn btn-danger delete"><i class="fa fa-trash"></i></span>
                `;
          },
          events: {
            "click .edit": (e, value, row, index) => {
              //   alert("Editar");
              this._editar(row);
            },
            "click .delete": (e, value, row, index) => {
              //   alert("Eliminar");
              this._eliminar(row.userid);
            },
          },
        },
      ],
    });
  }

  _refreshTable() {
    $("#table").bootstrapTable("refresh");
  }

  _editar(data) {
    alert(`Actualiar los sgtes datos ${JSON.stringify(data)}`);
  }

  _eliminar(id) {
    // alert(`Eliminar el id : ${id}`);
    var formData = new FormData();
    formData.append("id", id);

    axios
      .post("ajax/persona.php?op=eliminar", formData)
      .then((response) => {
        this._refreshTable();
        alert(response.data);
      })
      .catch((error) => {
        console.log(error);
      });
  }

  init() {
    console.log("Estoy aqui");
    this._listar();
  }
}

$(() => {
  new Persona().init();
});
