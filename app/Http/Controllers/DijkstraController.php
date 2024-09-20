<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DijkstraController extends Controller
{
    public function findShortestPath(Request $request)
    {
        
        // Define the graph (Adjacency matrix or list)
        $graph = [
            'School' => ['Mall' => 7, 'Air Port' => 5],
            'Mall' => ['School' => 7, 'Hospital' => 8, 'Air Port' => 9, 'House' => 7],
            'Hospital' => ['Mall' => 8, 'House' => 5],
            'Air Port' => ['School' => 5, 'Mall' => 9, 'House' => 15, 'Fire Station' => 6],
            'House' => ['Mall' => 7, 'Hospital' => 5, 'Air Port' => 15, 'Fire Station' => 8, 'Gas Pipeline' => 9],
            'Fire Station' => ['Air Port' => 6, 'House' => 8, 'Gas Pipeline' => 11],
            'Railway Station' => ['House' => 9, 'Fire Station' => 11],
            'Gas Pipeline' => ['House' => 9, 'Fire Station' => 11]
        ];

     // Get start point from the request
        // $start = $request->input('start'); // starting node
        $start = 'School';

            
        // Set a fixed end node (Railway Station)
        $end = 'Gas Pipeline';

        // Run Dijkstra's Algorithm to calculate shortest path
        $shortest_path = $this->dijkstra($graph, $start, $end);
        // Return the view with shortest path and start point
        //dd($shortest_path);
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
                // Either no reachable node or an invalid minNode
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
}