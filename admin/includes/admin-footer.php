<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
<script src="../../js/scripts.js"></script>

<script type="text/javascript">
    google.charts.load('current', {'packages': ['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        <?php $status = chartData();  ?>
        var data = google.visualization.arrayToDataTable([
            ['status', 'total', 'approved', 'unapproved'],
            ['posts', <?php echo $status['postsCount']?>, <?php echo $status['publishedPostsCount']?>, <?php echo($status['postsCount'] - $status['publishedPostsCount'])?>],
            ['users', <?php echo $status['usersCount']?>, 0, 0],
            ['comments', <?php echo $status['commentsCount']?>, <?php echo $status['approvedCommentsCount']?>, <?php echo($status['commentsCount'] - $status['approvedCommentsCount'])?>],
        ]);

        var options = {
            chart: {
                title: 'website states',
                subtitle: 'total, approved, unapproved',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    google.charts.load('current', {'packages': ['bar']});
    google.charts.setOnLoadCallback(drawChart);


</script>

</body>

</html>
