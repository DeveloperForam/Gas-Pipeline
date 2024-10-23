<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class DijkstraController extends Controller
{
    public function findShortestPath(Request $request)
       {
           // Define the graph with the available destinations
           $graph = [
               'School' => ['Mall' => 7, 'Air Port' => 5],
               'Mall' => ['School' => 7, 'Hospital' => 8, 'Air Port' => 9, 'House 1' => 7],
               'Hospital' => ['Mall' => 8, 'House 2' => 5],
               'Air Port' => ['School' => 5, 'Mall' => 9, 'House 3' => 15, 'Fire Station' => 6],
               'House 1' => ['Mall' => 7, 'Hospital' => 5, 'Air Port' => 15, 'Fire Station' => 8],
               'House 2' => ['Hospital' => 5, 'House 4' => 4],
               'House 3' => ['Air Port' => 15, 'House 5' => 9],
               'House 4' => ['House 2' => 4, 'Fire Station' => 10],
               'House 5' => ['House 3' => 9, 'Fire Station' => 8],
               'Fire Station' => ['Air Port' => 6, 'House 1' => 8, 'House 4' => 10, 'House 5' => 8, 'Gas Station' => 11],
               'Temple' => ['House 1' => 14, 'Fire Station' => 12],
               'Gas Station' => ['Fire Station' => 11]
           ];
   
           // Get 'From' destination from the request
           $start = $request->input('start'); 
   
           // Set 'To' destination to be static (Gas Station)
           $end = 'Gas Station';
   
           // Run Dijkstra's Algorithm to calculate shortest path
           $shortest_path = $this->dijkstra($graph, $start, $end);
   
           // Return the view with shortest path and start point
           return view('dijkshtra', [
               'shortest_path' => $shortest_path,
               'start' => $start, // Pass the start point to the view
               'graph' => $graph 
           ]);
       }
   
       private function dijkstra($graph, $start, $end)
       {
           $visited = [];
           $distances = [];
           $previous = [];
   
           // Initialize distances and previous nodes
           foreach ($graph as $node => $edges) {
               $distances[$node] = INF;
               $previous[$node] = null;
           }
           $distances[$start] = 0;
   
           $queue = $distances;
   
           while (!empty($queue)) {
               // Get the node with the minimum distance
               $minNode = array_search(min($queue), $queue);
   
               // Check if minNode is valid and exists in the graph
               if ($minNode === false || !isset($graph[$minNode])) {
                   break;
               }
   
               // If we reached the end node, break
               if ($minNode === $end) {
                   break;
               }
   
               // Skip if the node has already been visited
               if (in_array($minNode, $visited)) {
                   unset($queue[$minNode]);
                   continue;
               }
   
               // Update distances to neighboring nodes
               foreach ($graph[$minNode] as $neighbor => $weight) {
                   if (in_array($neighbor, $visited)) {
                       continue;
                   }
   
                   $alt = $distances[$minNode] + $weight;
   
                   if ($alt < $distances[$neighbor]) {
                       $distances[$neighbor] = $alt;
                       $previous[$neighbor] = $minNode;
                   }
               }
   
               $visited[] = $minNode;
               unset($queue[$minNode]);
           }
   
           // Reconstruct the shortest path
           $path = [];
           $currentNode = $end;
   
           while (isset($previous[$currentNode])) {
               array_unshift($path, $currentNode);
               $currentNode = $previous[$currentNode];
           }
   
           if ($currentNode === $start) {
               array_unshift($path, $start);
           } else {
               // No path found
               return [
                   'distance' => 'No path found',
                   'path' => []
               ];
           }
   
           return [
               'distance' => $distances[$end] !== INF ? $distances[$end] : 'No path found',
               'path' => $path
           ];
       }

       public function downloadPDF(Request $request)
       {
           // Get the 'start' point from the request
           $start = $request->input('start');
       
           // Run Dijkstra's algorithm to find the shortest path
           $shortest_path = $this->findShortestPath($request); // Use your logic here
    
          // Load the view and generate the PDF
           $html = view('dijkstra_report', compact('start','shortest_path'))->render(); 
          $options = new \Dompdf\Options();
           
           $dompdf = new \Dompdf\Dompdf($options);
           $dompdf->loadHtml($html);
           $dompdf->setPaper('A4', 'portrait');
           $dompdf->render();
       
           return $dompdf->stream('Shortest-Path-Report.pdf');
       }
}