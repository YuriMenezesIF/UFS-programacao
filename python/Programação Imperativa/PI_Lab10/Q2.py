import csv
#pessoa.csv para pessoa1.csv
with open('pessoa.csv', 'r') as file:
    reader = csv.reader(file)
    for row in reader:
         
        with open('pessoa1.csv', 'w') as file1:
            
                writer = csv.writer(file1, delimiter = ',')
                writer.writerow([row])
            
           