# Exemplo 1
import csv
with open('pessoa.csv', 'r') as file:
    reader = csv.reader(file)
    for row in reader:
        print(row)

# Exemplo 2
import csv
with open('pessoa.csv', 'r',) as file:
    reader = csv.reader(file, delimiter = '\t')
    for row in reader:
        print(row)           

# Exemplo 3
import csv
with open('protagonista.csv', 'w', newline='') as file:
    writer = csv.writer(file)
    writer.writerow(["SN", "Movie", "Protagonist"])
    writer.writerow([1, "Lord of the Rings", "Frodo Baggins"])
    writer.writerow([2, "Harry Potter", "Harry Potter"])

# Exemplo 4
import csv
csv_rowlist = (["SN", "Movie", "Protagonist"]),([1, "Lord of the Rings", "Frodo Baggins"]), ([2, "Harry Potter", "Harry Potter"])
with open('protagonista.csv', 'w') as file:
        writer = csv.writer(file)
        writer.writerows(csv_rowlist)

# Exemplo 5
import csv
with open('protagonista.csv', 'w') as file:
    writer = csv.writer(file, delimiter = '\t')
    writer.writerow(["SN", "Movie", "Protagonist"])
    writer.writerow([1, "Lord of the Rings", "Frodo Baggins"])
    writer.writerow([2, "Harry Potter", "Harry Potter"])