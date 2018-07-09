<template>

    <!-- Content Wrapper. Contains page content -->
 <div id="view" class="w3-main" style="margin-left:350px;margin-top:43px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Events page <hr>
      </h1>
    </section><hr>
    <!-- /.content -->

  <section class="content" style="background: #fff;">
    <div class="box-body">
        <add-to-calendar title=""
                       location=""
                       :start="new Date()"
                       :end="new Date((new Date).setDate((new Date).getDate() + 1))"
                       details=""
                       inline-template>
        <div>
          
          <div class="col-md-6">
            <h5>Add to Google calendar</h5> <hr>
            <google-calendar id="google-calendar">
              <i class="fa fa-google w3-button w3-white w3-border w3-round-large"></i> 
            </google-calendar>
          </div>
        </div>
      </add-to-calendar>
    </div>

    <iframe src="https://calendar.google.com/calendar/embed?title=Upcoming%20events&amp;height=500&amp;wkst=1&amp;bgcolor=%23ffcc99&amp;src=k791ve9euibn3l7k7veecmf6lc%40group.calendar.google.com&amp;color=%23853104&amp;ctz=Africa%2FNairobi" style="border-width:0" width="600" height="500" frameborder="0" scrolling="no"></iframe>
  </section>
</div>
</template>
