var per = 5;
var page = 1;
var stop = false;
var condition = false;

new Vue({
  el: '#main',
  created: function() {
    this.getUsers();
  },
  data: {
    condition: condition,
    per: per,
    lists: [],
    stop: stop
  },
  methods: {
    getUsers: function() {

      this.$http.get('functions/function.php?per=' + this.per + '&page=' + page + '&stop=' + stop).then(function(response) {
        this.lists = response.data.lists;
        stop = response.data.stop;
        console.log(response.data);
      }, function() {
        alert('Error!');
      });

    },
    prev: function() {
      if (page > 1) {
        page--;
      }
      this.getUsers();
    },
    next: function() {
      if (!stop) {
        page++;
      }
      this.getUsers();
    },
    cambia: function() {
      if (!((this.per < 1) || (this.per > 50))) {
        this.getUsers();
      }
    }
  }
});
