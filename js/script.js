const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: "server.php",
      todoList: [],
      lastID: 3,
      selectPriority: "low",
      textTask: "",
      deleteTask: "",
    };
  },
  methods: {
    callList() {
      axios.get(this.apiUrl).then((res) => (this.todoList = res.data));
    },
    removeTask(index) {
      const data = new FormData();
      data.append("deleteTask", index);
      axios.post(this.apiUrl, data).then((res) => {
        this.todoList = res.data;
      });
    },
    addTask() {
      this.lastID++;
      const newTask = {
        id: this.lastID,
        name: "Leonardo Mastrangelo",
        image: "img/us.png",
        task: this.textTask,
        priority: this.selectPriority,
        text: this.selectPriority,
        doneTask: false,
      };
      axios
        .post(this.apiUrl, newTask, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => (this.todoList = res.data))
        .finally(() => {
          this.textTask = "";
          this.selectPriority = "low";
        });
    },
    todoDone(i) {
      this.todoList[i].doneTask = this.todoList[i].doneTask ? false : true;
    },
  },
  mounted() {
    this.callList();
    console.log(this.todoList);
  },
}).mount("#app");
