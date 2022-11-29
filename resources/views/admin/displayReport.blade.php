<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<Report> 
    @foreach ($data as $report)
        <reportList>
            <Name>{{$report->name}}</Name>
            <Stock>{{$report->stock}}</Stock>
        </reportList>
    @endforeach
</Report>
