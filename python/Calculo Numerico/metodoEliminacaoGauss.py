import numpy as np

import matplotlib.pyplot as plt



# Defina a matriz a ser escalonada

A = np.array( [[2,-6,1 ],

               [-1,7,-1],

               [1,-3,2]])



nrows, ncols = A.shape

for i in range(nrows):

    for j in range(i+1, nrows):

            factor = A[j, i] / A[i, i]

            A[j, i:] = A[j, i:] - factor * A[i, i:]




print("A matriz escalonada é:")

print(A)