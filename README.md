# Shortest Route Finder Using Dijkstra Algorithm

This project is a Python-based implementation of the Dijkstra Algorithm to determine the shortest route between locations in Bandung. The program represents each location as a node in a graph and uses weighted edges to store the distance between locations.

Users can interactively input a starting point and destination, then the system will calculate:

* The shortest distance between the two locations
* The optimal route/path to take

## Features

* Implementation of Dijkstra’s shortest path algorithm
* Interactive user input
* Displays shortest route and total distance
* Supports repeated searches using looping
* Uses Python dictionary-based graph representation
* Handles invalid location input validation

## Technologies Used

* Python
* Heap Queue (`heapq`) for priority queue optimization

## Example Output

```bash
Masukkan lokasi awal : Pasteur
Masukkan lokasi tujuan : Sarijadi

=== HASIL PENCARIAN ===
Jarak terpendek dari Pasteur ke Sarijadi: 4.0 km
Rute: Pasteur -> Mulyasari -> Sukagalih -> Sarijadi
```

## Algorithm

This project uses the Dijkstra Algorithm, a greedy algorithm that finds the shortest path between nodes in a weighted graph efficiently.

## Purpose

This project was created to learn and demonstrate:

* Graph data structures
* Pathfinding algorithms
* Priority queue implementation
* Real-world route simulation using Python
