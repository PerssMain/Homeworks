<?php

require_once 'sort_fabric/src/sort/insertion_sort.php';
require_once 'sort_fabric/src/sort/merge_sort.php';
require_once 'sort_fabric/src/sort/selection_sort.php';
require_once 'test/test.php';

$inputList = [10, 35, 7, 81, 99, 2, 15];
$expectedList = [2, 7, 10, 15, 35, 81, 99];

function testMergeSort()
{
    global $inputList, $expectedList;
    $resultList = mergeSort($inputList);
    if ($resultList === $expectedList) {
        echo "Merge Sort: Passed\n";
    } else {
        echo "Merge Sort: Failed\n";
    }
}

function testInsertionSort()
{
    global $inputList, $expectedList;
    $resultList = insertionSort($inputList);
    if ($resultList === $expectedList) {
        echo "Insertion Sort: Passed\n";
    } else {
        echo "Insertion Sort: Failed\n";
    }
}

function testSelectionSort()
{
    global $inputList, $expectedList;
    $resultList = selectionSort($inputList);
    if ($resultList === $expectedList) {
        echo "Selection Sort: Passed\n";
    } else {
        echo "Selection Sort: Failed\n";
    }
}

echo "Running sort functions tests...\n";
testMergeSort();
testInsertionSort();
testSelectionSort();
