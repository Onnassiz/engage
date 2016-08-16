
<?php
$viewData = [
        'page' => 'publications',
        'pageTitle' => 'History | Engage',
]
?>
@extends('layouts.userMaster')
@section('content')


    <div class="container page-body">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Publication History</div>
            <div class="panel-body">
                @if(count($publications) != 0)
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Recipient(s)</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            $count = 0;
                            foreach($publications as $publication)
                            {
                                $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count?></td>
                                    <td><?php echo $publication->title?></td>
                                    <td><?php echo \App\PublicationsContacts::wherePublicationId($publication->id)->get()->count()?> contact(s)</td>
                                    <td><a href="{{ '/publications/view/'.$publication->id }}"><i class="fa fa-eye" style="font-size: 10px"></i> view</a></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </table>
                @else
                    <h3>You have not made any publications</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
