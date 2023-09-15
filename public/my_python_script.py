
variable1 = "Hello, from Python!"
variable2 = 42
variable3 = ["apple", "banana", "cherry"]

# Format the output as a JSON string
import json
output_data = {
    "variable1": variable1,
    "variable2": variable2,
    "variable3": variable3
}
print(json.dumps(output_data))
