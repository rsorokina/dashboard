<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div id="app">

                <div class="row">
                    <div class="col-md-3">
                        <h1 v-text="title"></h1>
                    </div>
                </div>

                <div class="modal" id="widgetModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Select widget</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div :class="'col-md-' + widget.size" v-for="widget in widgets">
                                        <div v-on:click="addWidget(widget)" style="cursor: pointer">
                                            <widget-component v-bind:class="widget.class" v-bind:title="widget.title" v-bind:content="widget.content"></widget-component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix">
                    <button class="btn btn-default"  v-on:click="addRow()">
                        <span class="panel-title">Add Panel &nbsp;&nbsp;</span>
                        <span class="glyphicon glyphicon-plus" ></span>
                    </button>
                </div>
                <br>

                <div id="sort">
                    <div class="panel panel-default sortable-item ui-state-default" v-for="(row, index) in rows">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-7">
                                    <span v-on:click="row.change = !row.change" v-if="!row.change" v-text="row.title"></span>
                                    <input type="text" v-model="row.title" v-if="row.change" @keyup.enter="row.change = !row.change">
                                </div>
                                <div class="col-md-5 text-right">
                                    <span class="glyphicon glyphicon-plus" v-on:click="setRowIndex(index)" data-toggle="modal" data-target="#widgetModal"></span>
                                    <span class="glyphicon glyphicon-copy"  v-on:click="copyRow(index)"></span>
                                    <span class="glyphicon glyphicon-remove"  v-on:click="removeRow(index)"></span>
                                    <span class="glyphicon glyphicon-menu-up" v-on:click="row.show = !row.show" v-if="!row.show"></span>
                                    <span class="glyphicon glyphicon-menu-down" v-on:click="row.show = !row.show" v-if="row.show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body sortrow" v-if="row.show">
                            <div class="sortable-item ui-state-default" :class="'col-md-' + item.size" v-for="(item, k) in row.items" >
                                <div class="panel" :class="item.class">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" v-text="item.title" v-if="!item.change"  v-on:click="item.change = !item.change"></h3>
                                        <input type="text" v-model="item.title" v-if="item.change" @keyup.enter="item.change = !item.change" style="color: #000;">
                                    </div>
                                    <div class="panel-body" v-html="item.content"></div>
                                </div>

                                <div style="position: absolute; right: 25px; top: 8px">
                                    <span class="glyphicon glyphicon-resize-horizontal"  v-on:click="resizeMore(item)"></span>
                                    <span class="glyphicon glyphicon-resize-small"  v-on:click="resizeSmall(item)"></span>
                                    <span class="glyphicon glyphicon-remove"  v-on:click="removeWidget(index, k)"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.5/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>
    <!-- SortableJS
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.4.2/Sortable.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    -->


    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>
</html>
