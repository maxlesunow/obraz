@extends('admin.layouts.app')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Toggle columns<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            Example of <code>togglable</code> columns table. These tables work off the concept of breakpoints. These can be customized, but the default breakpoints are: <code>phone: 480</code>, <code>tablet: 1024</code>. You then need to tell the table which columns to hide on which breakpoints, by specifying <code>data-hide</code> attributes on the table head columns.
        </div>

        <table class="table table-togglable table-hover default footable-loaded footable">
            <thead>
            <tr>
                <th data-toggle="true" class="footable-visible footable-first-column">First Name</th>
                <th data-hide="phone" class="footable-visible">Last Name</th>
                <th data-hide="phone,tablet" class="footable-visible">Job Title</th>
                <th data-hide="phone,tablet" class="footable-visible">DOB</th>
                <th data-hide="phone" class="footable-visible">Status</th>
                <th class="text-center footable-visible footable-last-column" style="width: 30px;"><i class="icon-menu-open2"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Marth</td>
                <td class="footable-visible"><a href="#">Enright</a></td>
                <td class="footable-visible">Traffic Court Referee</td>
                <td class="footable-visible">22 Jun 1972</td>
                <td class="footable-visible"><span class="label label-success">Active</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Jackelyn</td>
                <td class="footable-visible">Weible</td>
                <td class="footable-visible"><a href="#">Airline Transport Pilot</a></td>
                <td class="footable-visible">3 Oct 1981</td>
                <td class="footable-visible"><span class="label label-default">Inactive</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Aura</td>
                <td class="footable-visible">Hard</td>
                <td class="footable-visible">Business Services Sales Representative</td>
                <td class="footable-visible">19 Apr 1969</td>
                <td class="footable-visible"><span class="label label-danger">Suspended</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Nathalie</td>
                <td class="footable-visible"><a href="#">Pretty</a></td>
                <td class="footable-visible">Drywall Stripper</td>
                <td class="footable-visible">13 Dec 1977</td>
                <td class="footable-visible"><span class="label label-info">Pending</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Sharan</td>
                <td class="footable-visible">Leland</td>
                <td class="footable-visible">Aviation Tactical Readiness Officer</td>
                <td class="footable-visible">30 Dec 1991</td>
                <td class="footable-visible"><span class="label label-default">Inactive</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Maxine</td>
                <td class="footable-visible"><a href="#">Woldt</a></td>
                <td class="footable-visible"><a href="#">Business Services Sales Representative</a></td>
                <td class="footable-visible">17 Oct 1987</td>
                <td class="footable-visible"><span class="label label-info">Pending</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <ul class="icons-list">
                        <li class="dropup">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Sylvia</td>
                <td class="footable-visible"><a href="#">Mcgaughy</a></td>
                <td class="footable-visible">Hemodialysis Technician</td>
                <td class="footable-visible">11 Nov 1983</td>
                <td class="footable-visible"><span class="label label-danger">Suspended</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <ul class="icons-list">
                        <li class="dropup">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>Lizzee</td>
                <td class="footable-visible"><a href="#">Goodlow</a></td>
                <td class="footable-visible">Technical Services Librarian</td>
                <td class="footable-visible">1 Nov 1961</td>
                <td class="footable-visible"><span class="label label-danger">Suspended</span></td>
                <td class="text-center footable-visible footable-last-column">
                    <ul class="icons-list">
                        <li class="dropup">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
