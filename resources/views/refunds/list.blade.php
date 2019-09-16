@extends('layouts.app')

@section('content')
    <!-- Create Refund Form... -->

    <!-- Current Refunds -->
    @if (count($refunds) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Refunds
            </div>

            <div class="panel-body">
                <table class="table table-striped refund-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Refund</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($refunds as $refund)
                            <tr>
                                <!-- Refund Name -->
                                <td class="table-text">
                                    <div>{{ $refund->name }}</div>
                                </td>

                                <td>
                                    <!-- TODO: Delete Button -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection