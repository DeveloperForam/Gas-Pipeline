<table>
        <thead>
            <tr>
                <th>Node</th>
                <th>Distance  start from {{ $start }}</th>

            </tr>
        </thead>
        <tbody>
            @php
                // Calculate and display cumulative distances for each node in the path
                $cumulativeDistance = 0;
                $previousNode = $start;
            @endphp

            @foreach ($shortest_path['path'] as $node)
                @php
                    // Skip the first node (start) for calculating distance
                    if ($node !== $start) {
                        $cumulativeDistance += $graph[$previousNode][$node];
                        $previousNode = $node;
                    }
                @endphp
                <tr>
                    <td>{{ $node }}</td>
                    <td>{{ $loop->first ? 0 : $cumulativeDistance }}</td>
                </tr>
            @endforeach
        </tbody>
        {{-- <!--<tfoot>
            <tr class="path">
                <td>Total Distance</td>
                <td>{{ $shortest_path['distance'] }}</td>
            </tr>
        </tfoot>--> --}}
    </table>