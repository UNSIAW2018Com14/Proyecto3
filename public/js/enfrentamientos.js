$('select[name=equipo2]').on('change', function() {
    var self = this;
    $('select[name=equipo1]').find('option').prop('disabled', function() {
        return this.value == self.value
    });
 });
 
 $('select[name=equipo1]').on('change', function() {
   var self = this;
   $('select[name=equipo2]').find('option').prop('disabled', function() {
       return this.value == self.value
   });
 });