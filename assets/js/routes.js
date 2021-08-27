function initRoutes () {
  var Routes = {

    home : function(context, next){ 

    document.getElementById('page').innerHTML = 'Homepage';

    },

    about : function(context, next){    
    document.getElementById('page').innerHTML = 'About';

    },
    hotels : function(context, next){ 
        document.getElementById('page').innerHTML = 'Hotels';

     },
    notfound : function (context, next) { document.location.href="/"; },

  };
  
  // page.base('/');
  page('/', Routes.home);
  page('/about', Routes.about);
  page('/hotels*', Routes.hotels);
  // page('*', Routes.notfound)
  page('*', function(){ $('body').text('Not found!') });
  page();
}
initRoutes();


