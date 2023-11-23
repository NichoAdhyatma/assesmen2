import cv2
import csv
import cvzone
import os
from cvzone.HandTrackingModule import HandDetector
import time
import requests
import numpy as np
from io import BytesIO
from io import StringIO
import time

# class DragImg():
#     # next_id = 1  # Class variable to automatically assign IDs

#     def __init__(self, path, posOrigin, imgType, imgid):
#         self.img_id = imgid  # Assign the next available ID
#         # DragImg.next_id += 1  # Increment the ID counter
#         self.posOrigin = posOrigin
#         self.imgType = imgType
#         self.path = path

#         if self.imgType == 'png':
#             self.img = cv2.imread(self.path, cv2.IMREAD_UNCHANGED)
#         else:
#             self.img = cv2.imread(self.path)
#         # print("UKURANNYA BEB = ",self.img.shape[1]," , ",self.img.shape[0])
#         print("Imagenya beb = ",self.img)
        
#         if self.img.shape[1] > self.img.shape[0]:
#             new_height = int((200 / self.img.shape[1]) * self.img.shape[0])
#             self.img = cv2.resize(self.img, (200, new_height))
#         else:
#             new_width = int((200 / self.img.shape[0]) * self.img.shape[1])
#             self.img = cv2.resize(self.img, (new_width, 200))    
#         self.size = self.img.shape[:2]

#     def update(self, cursor):
#         ox, oy = self.posOrigin
#         h, w = self.size
#         if (ox < cursor[0] < ox+w) and (oy < cursor[1] < oy+h):
#             self.posOrigin = cursor[0] - w // 2, cursor[1] - h // 2

class DragImg():
    def __init__(self, image_data, posOrigin, imgType, imgid):
        self.img_id = imgid
        self.posOrigin = posOrigin
        self.imgType = imgType
        self.image_data = image_data  # Use the image data directly

        # if self.imgType == 'png':
        #     self.img = cv2.imdecode(self.image_data, cv2.IMREAD_COLOR)
        # else:
        #     self.img = cv2.imdecode(self.image_data, cv2.IMREAD_COLOR)
        self.img = self.image_data
        if self.img.shape[1] > self.img.shape[0]:
            new_height = int((200 / self.img.shape[1]) * self.img.shape[0])
            self.img = cv2.resize(self.img, (200, new_height))
        else:
            new_width = int((200 / self.img.shape[0]) * self.img.shape[1])
            self.img = cv2.resize(self.img, (new_width, 200))

        self.size = self.img.shape[:2]

    def update(self, cursor):
        ox, oy = self.posOrigin
        h, w = self.size
        if (ox < cursor[0] < ox + w) and (oy < cursor[1] < oy + h):
            self.posOrigin = cursor[0] - w // 2, cursor[1] - h // 2

class MCQ():
    def __init__(self,data):
        self.question = data[0]
        self.imgQuestion = data[1]
        self.Ans = data[2:6]
        self.answer = int(data[6])
        self.type = data[7]

        self.userAns = None

    def update(self, cursor, bbox, userAns):
        x1, y1, x2, y2 = bbox
        if x1 < cursor[0] < x2 and y1 < cursor[1] < y2:
            self.userAns = userAns  # Assuming the index is 1 for the single bbox
            cv2.rectangle(img, (x1, y1), (x2, y2), (0, 255, 0), cv2.FILLED)

    def updateClick(self,cursor,bboxs):
        for x, bbox in enumerate(bboxs):
            x1,y1,x2,y2 = bbox
            if x1 < cursor[0] < x2 and y1 < cursor[1] < y2:
                self.userAns = x+1
                cv2.rectangle(img, (x1,y1),(x2,y2), (0,255,0), cv2.FILLED)

    def submit(self, cursor, bbox):
        x1, y1, x2, y2 = bbox
        if x1 < cursor[0] < x2 and y1 < cursor[1] < y2:
            cv2.rectangle(img, (x1, y1), (x2, y2), (0, 255, 0), cv2.FILLED)
            return True


# def initialize_camera():
#     cap = cv2.VideoCapture(cv2.CAP_V4L2)
#     if not cap.isOpened():
#         print("Error: Could not open camera.")
#         return None
#     cap.set(3, 1280)
#     cap.set(4, 720)
#     return cap

# def release_camera(cap):
#     if cap is not None:
#         cap.release()

time.sleep(5)
cap = cv2.VideoCapture(-1)
time.sleep(5)
if not cap.isOpened():
    print("Error: Could not open camera.")
cap.set(3, 1280)
cap.set(4, 720)
detector = HandDetector(detectionCon=1)

listImg = []


distImg = 0
imgid = 1
selesai = False

active_img = None
id_jawaban = None


# Position and size of the bbox
bbox_x = 50  # X-coordinate of the top-left corner of the bbox
bbox_y = 150  # Y-coordinate of the top-left corner of the bbox
score = 0
scoreSusah = 0
scoreMudah = 0

url_csv = "https://moon.torodeveloper.co/assessment-test-lp/public/csv/csvDD/dd.csv"
response = requests.get(url_csv)
csv_content = response.text
# pathCSV = response.text
reader = csv.reader(StringIO(csv_content))
next(reader)
mcqList = []
qTotal = 0
for row in reader:
    mcqList.append(MCQ(row))
    qTotal += 1




qNo = 0 


last_click_time = time.time() - 60 
hasShowques = 0
hasShowimg = 0


url_csv_susah = "https://moon.torodeveloper.co/assessment-test-lp/public/csv/csvDD/ddSusah.csv"
response_susah = requests.get(url_csv_susah)
csv_content_susah = response_susah.text
reader_susah = csv.reader(StringIO(csv_content_susah))
next(reader_susah)
mcqListSusah = []
qTotalSusah = 0
for row in reader_susah:
    mcqListSusah.append(MCQ(row))
    qTotalSusah += 1
qNoSusah = 0 

url_csv_mudah = "https://moon.torodeveloper.co/assessment-test-lp/public/csv/csvDD/ddMudah.csv"
response_mudah = requests.get(url_csv_mudah)
csv_content_mudah = response_mudah.text
reader_mudah = csv.reader(StringIO(csv_content_mudah))
next(reader_mudah)
mcqListMudah = []
qTotalMudah = 0
for row in reader_mudah:
    mcqListMudah.append(MCQ(row))
    qTotalMudah += 1
qNoMudah = 0 
countBreak = 0

while True:
    # Webcam dan hand detection
    success, img = cap.read()

    if not success:
        print("Error reading frame. Exiting the loop or handling accordingly.")
        countBreak += 1
        if countBreak > 5:
            break    
        else:
            continue  # or continue to try the next frame

    img = cv2.flip(img, 1)
    hands, img = detector.findHands(img, flipType=False)
   
        

    # mcq untuk soal-soal
    if qNo<qTotal:
        mcq = mcqList[qNo]
        if mcq.type == 'drag':
            # Kotak untuk pertanyaan  
            if True:
                questionImage = mcq.imgQuestion
                # cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + bbox_width, bbox_y + bbox_height), (0, 0, 0), cv2.FILLED)
                # Local
                # C:\xamppMaxy\htdocs\assessment-test-lp\public
                # bbox_image = cv2.imread(f"C:/xamppMaxy/htdocs/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}")
                # Server
                # bbox_image = cv2.imread(f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}")
                if hasShowques == 0:
                    url = f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}"
                    response = requests.get(url)
                    img_array_ques = np.asarray(bytearray(response.content), dtype=np.uint8)
                    hasShowques = 1
                bbox_image = cv2.imdecode(img_array_ques, cv2.IMREAD_COLOR)
                # bbox_height, bbox_width, _ = bbox_image.shape  # Get the width and height of the image

                new_height = 200   
                aspect_ratio = bbox_image.shape[1] / bbox_image.shape[0]  # Width / Height
                new_width = int(new_height * aspect_ratio)
                resized_image = cv2.resize(bbox_image, (new_width, new_height))

                # bbox_text = "Your text goes here"
                bbox_y = 675 - new_height
                cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + new_width , bbox_y + new_height), (0, 0, 255), 2)  # Red bbox border
                img[bbox_y:bbox_y + new_height, bbox_x:bbox_x + new_width] = resized_image  # Paste the image inside the bbox
                # cv2.putText(img, bbox_text, (bbox_x, bbox_y + bbox_height + 30), cv2.FONT_HERSHEY_SIMPLEX, 0.7, (255, 255, 255), 2)



            if hasShowimg == 0:
                # distImg = 0
                # imgid = 1
                for ansImg in mcq.Ans:                
                    if 'png' in ansImg:
                        imgType = 'png'
                    else:
                        imgType = 'jpg'
                    # Local
                    # C:\xamppMaxy\htdocs\assessment-test-lp\public
                    # listImg.append(DragImg(f"C:/xamppMaxy/htdocs/assessment-test-lp/public/assets/InteligenceSet/Set1/answerImg/{ansImg}", [100 + distImg * 250, 175], imgType,imgid))
                    url = f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/answerImg/{ansImg}"

                    # Download the image from the URL
                    response = requests.get(url)
                    img_array = np.asarray(bytearray(response.content), dtype=np.uint8)

                    # Decode the image using OpenCV
                    answer_image = cv2.imdecode(img_array, cv2.IMREAD_COLOR)
                    
                    # Assuming imgType, imgid, and distImg are already defined
                    listImg.append(DragImg(answer_image, [100 + distImg * 250, 175], imgType, imgid))
                    # print(ansImg)

                    # Server
                    # listImg.append(DragImg(f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/answerImg/{ansImg}", [100 + distImg * 250, 175], imgType,imgid))
                    distImg += 1
                    imgid += 1
                    hasShowimg = 1
            
            

            # Tonbol Submit
            img,bbox = cvzone.putTextRect(img,mcq.question,[100,100],2,2,offset=50,border=2)
            img,bboxSubmit = cvzone.putTextRect(img,"Submit",[1000,562],2,2,offset=50,border=2)
            cv2.rectangle(img, (700, 500), (900, 600), [0, 255, 0], 2)
            cv2.putText(img, "Taruh Jawabanmu Disini", (670, 630), cv2.FONT_HERSHEY_SIMPLEX, 0.7, (255, 255, 255), 2)
            

            try:
                for imgS in listImg:
                    h, w = imgS.size
                    ox, oy = imgS.posOrigin
                    # if imgS.imgType == 'png':
                    #     img = cvzone.overlayPNG(img, imgS.img, [ox, oy])
                    # else:
                    img[oy:oy+h, ox:ox+w] = imgS.img
            except:
                pass
            # print("Id Jawaban = ",id_jawaban)

            if hands:
                lmlist = hands[0]['lmList']
                cursor = lmlist[8]
                length, info, img = detector.findDistance(lmlist[8], lmlist[4], img)

                if length < 60:
                    cursor = lmlist[8]
                    if (id_jawaban != None) and (time.time() - last_click_time) >= 1.5:
                        mcq.update(cursor,bboxSubmit,id_jawaban)
                        if mcq.userAns is not None:
                            qNo+=1
                            listImg.clear()
                            id_jawaban =None
                            distImg = 0
                            imgid = 1
                            hasShowimg = 0
                            hasShowques = 0
                            cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + new_width, bbox_y + new_height), (0, 0, 0), cv2.FILLED)

                            # Test ubah gambar
                            
                            
                    if active_img is not None:
                        active_img.update(cursor)
                
                else:
                    for imgS in listImg:
                        ox, oy = imgS.posOrigin
                        h, w = imgS.size
                        if (ox < cursor[0] < ox+w) and (oy < cursor[1] < oy+h):
                            active_img = imgS
                            break
                    else:
                        active_img = None

                
                # Cek jawaban dengan melihat apa ada gambar di kotak hijau
                if 700 < cursor[0] < 900 and 500 < cursor[1] < 600:
                    if active_img is not None:
                        # print("Image ID:", active_img.img_id)
                        id_jawaban = active_img.img_id
                        # print(id_jawaban)

        else:
            img,bbox = cvzone.putTextRect(img,mcq.question,[100,100],2,2,offset=50,border=2)


            questionImage = mcq.imgQuestion
            # cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + bbox_width, bbox_y + bbox_height), (0, 0, 0), cv2.FILLED)

            # Local
            # C:\xamppMaxy\htdocs\assessment-test-lp\public
            # print(questionImage)
            # bbox_image = cv2.imread(f"C:/xamppMaxy/htdocs/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}")
            # print(bbox_image)
            # Server
            # bbox_image = cv2.imread(f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}")
            if hasShowques == 0:
                url = f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}"
                response = requests.get(url)
                img_array_ques = np.asarray(bytearray(response.content), dtype=np.uint8)
                hasShowques = 1
            bbox_image = cv2.imdecode(img_array_ques, cv2.IMREAD_COLOR)

            # bbox_height, bbox_width, _ = bbox_image.shape  # Get the width and height of the image

            new_height = 200   
            aspect_ratio = bbox_image.shape[1] / bbox_image.shape[0]  # Width / Height
            new_width = int(new_height * aspect_ratio)
            resized_image = cv2.resize(bbox_image, (new_width, new_height))

            # bbox_text = "Your text goes here"
            bbox_y = 675 - new_height
            cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + new_width , bbox_y + new_height), (0, 0, 255), 2)  # Red bbox border
            img[bbox_y:bbox_y + new_height, bbox_x:bbox_x + new_width] = resized_image  # Paste the image inside the bbox
            # cv2.putText(img, bbox_text, (bbox_x, bbox_y + bbox_height + 30), cv2.FONT_HERSHEY_SIMPLEX, 0.7, (255, 255, 255), 2)

            
            for i, ans in enumerate(mcq.Ans):
                x = 100 if i % 2 == 0 else 650
                y = 250 if i < 2 else 400
                img, bboxAns = cvzone.putTextRect(img, ans, [x, y], 2, 2, offset=50, border=2)
                if i == 0:
                    bbox1 = bboxAns
                elif i == 1:
                    bbox2 = bboxAns
                elif i == 2:
                    bbox3 = bboxAns
                elif i == 3:
                    bbox4 = bboxAns
                else:
                    pass
            if hands:
                lmList = hands[0]['lmList']
                cursor = lmList[8]
                length, info, img = detector.findDistance(lmList[8], lmList[4], img)
                # print(length)
                if (length < 60) and (time.time() - last_click_time) >= 1.5:  # Check if the delay has passed
                    mcq.updateClick(cursor,[bbox1 , bbox2, bbox3, bbox4])
                    # print(mcq.userAns)
                    last_click_time = time.time()  # Update the last click time
                    if mcq.userAns is not None:
                        qNo+=1
                        listImg.clear()
                        id_jawaban =None
                        distImg = 0
                        imgid = 1
                        hasShowimg = 0
                        hasShowques = 0
                        
    # After Tidak ada lagi pertanyaan 
    else:
        score = 0
        for mcq in mcqList:
            if (mcq.answer == mcq.userAns):
                score += 1

        # Penentuan ke soal susah atau mudah

        if(score >=12):
            if qNoSusah<qTotalSusah:
                mcqS = mcqListSusah[qNoSusah]
                if mcqS.type == 'drag':
                    # Kotak untuk pertanyaan  
                    if True:
                        questionImage = mcqS.imgQuestion
                        # cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + bbox_width, bbox_y + bbox_height), (0, 0, 0), cv2.FILLED)
                        # Local
                        # C:\xamppMaxy\htdocs\assessment-test-lp\public 
                        # bbox_image = cv2.imread(f"C:/xamppMaxy/htdocs/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}")
                        if hasShowques == 0:
                            url = f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}"
                            response = requests.get(url)
                            img_array = np.asarray(bytearray(response.content), dtype=np.uint8)
                            hasShowques = 1
                        bbox_image = cv2.imdecode(img_array, cv2.IMREAD_COLOR)
                        # Server
                        # bbox_image = cv2.imread(f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}")
                        # bbox_height, bbox_width, _ = bbox_image.shape  # Get the width and height of the image

                        new_height = 200   
                        aspect_ratio = bbox_image.shape[1] / bbox_image.shape[0]  # Width / Height
                        new_width = int(new_height * aspect_ratio)
                        resized_image = cv2.resize(bbox_image, (new_width, new_height))

                        # bbox_text = "Your text goes here"
                        bbox_y = 675 - new_height
                        cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + new_width , bbox_y + new_height), (0, 0, 255), 2)  # Red bbox border
                        img[bbox_y:bbox_y + new_height, bbox_x:bbox_x + new_width] = resized_image  # Paste the image inside the bbox
                        # cv2.putText(img, bbox_text, (bbox_x, bbox_y + bbox_height + 30), cv2.FONT_HERSHEY_SIMPLEX, 0.7, (255, 255, 255), 2)



                    if hasShowimg == 0:
                        # distImg = 0
                        # imgid = 1
                        for ansImg in mcqS.Ans:                
                            if 'png' in ansImg:
                                imgType = 'png'
                            else:
                                imgType = 'jpg'
                            # Local
                            # C:\xamppMaxy\htdocs\assessment-test-lp\public
                            # listImg.append(DragImg(f"C:/xamppMaxy/htdocs/assessment-test-lp/public/assets/InteligenceSet/Set1/answerImg/{ansImg}", [100 + distImg * 250, 175], imgType,imgid))
                            url = f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/answerImg/{ansImg}"

                            # Download the image from the URL
                            response = requests.get(url)
                            img_array = np.asarray(bytearray(response.content), dtype=np.uint8)

                            # Decode the image using OpenCV
                            answer_image = cv2.imdecode(img_array, cv2.IMREAD_COLOR)
                            
                            # Assuming imgType, imgid, and distImg are already defined
                            listImg.append(DragImg(answer_image, [100 + distImg * 250, 175], imgType, imgid))
                            # Server
                            # listImg.append(DragImg(f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/answerImg/{ansImg}", [100 + distImg * 250, 175], imgType,imgid))
                            distImg += 1
                            imgid += 1
                            hasShowimg = 1
                    
                    

                    # Tonbol Submit
                    img,bbox = cvzone.putTextRect(img,mcqS.question,[100,100],2,2,offset=50,border=2)
                    img,bboxSubmit = cvzone.putTextRect(img,"Submit",[1000,562],2,2,offset=50,border=2)
                    cv2.rectangle(img, (700, 500), (900, 600), [0, 255, 0], 2)
                    cv2.putText(img, "Taruh Jawabanmu Disini", (670, 630), cv2.FONT_HERSHEY_SIMPLEX, 0.7, (255, 255, 255), 2)
                    

                    try:
                        for imgS in listImg:
                            h, w = imgS.size
                            ox, oy = imgS.posOrigin
                            # if imgS.imgType == 'png':
                            #     img = cvzone.overlayPNG(img, imgS.img, [ox, oy])
                            # else:
                            img[oy:oy+h, ox:ox+w] = imgS.img
                    except:
                        pass
                    # print("Id Jawaban = ",id_jawaban)

                    if hands:
                        lmlist = hands[0]['lmList']
                        cursor = lmlist[8]
                        length, info, img = detector.findDistance(lmlist[8], lmlist[4], img)

                        if length < 60:
                            cursor = lmlist[8]
                            if (id_jawaban != None) and (time.time() - last_click_time) >= 1.5:
                                mcqS.update(cursor,bboxSubmit,id_jawaban)
                                if mcqS.userAns is not None:
                                    qNoSusah+=1
                                    listImg.clear()
                                    id_jawaban =None
                                    distImg = 0
                                    imgid = 1
                                    hasShowimg = 0
                                    hasShowques = 0

                                    cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + new_width, bbox_y + new_height), (0, 0, 0), cv2.FILLED)
                                    # Test ubah gambar
                                    
                                    
                            if active_img is not None:
                                active_img.update(cursor)
                        
                        else:
                            for imgS in listImg:
                                ox, oy = imgS.posOrigin
                                h, w = imgS.size
                                if (ox < cursor[0] < ox+w) and (oy < cursor[1] < oy+h):
                                    active_img = imgS
                                    break
                            else:
                                active_img = None

                        
                        # Cek jawaban dengan melihat apa ada gambar di kotak hijau
                        if 700 < cursor[0] < 900 and 500 < cursor[1] < 600:
                            if active_img is not None:
                                # print("Image ID:", active_img.img_id)
                                id_jawaban = active_img.img_id
                                # print(id_jawaban)

                else:
                    img,bbox = cvzone.putTextRect(img,mcqS.question,[100,100],2,2,offset=50,border=2)


                    questionImage = mcqS.imgQuestion
                    # cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + bbox_width, bbox_y + bbox_height), (0, 0, 0), cv2.FILLED)
                    # Local
                    # C:\xamppMaxy\htdocs\assessment-test-lp\public
                    # bbox_image = cv2.imread(f"C:/xamppMaxy/htdocs/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}")
                    if hasShowques == 0:
                        url = f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}"
                        response = requests.get(url)
                        img_array_ques = np.asarray(bytearray(response.content), dtype=np.uint8)
                        hasShowques = 1
                    bbox_image = cv2.imdecode(img_array_ques, cv2.IMREAD_COLOR)
                    # Server
                    # bbox_image = cv2.imread(f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}")
                    # bbox_height, bbox_width, _ = bbox_image.shape  # Get the width and height of the image

                    new_height = 200   
                    aspect_ratio = bbox_image.shape[1] / bbox_image.shape[0]  # Width / Height
                    new_width = int(new_height * aspect_ratio)
                    resized_image = cv2.resize(bbox_image, (new_width, new_height))

                    # bbox_text = "Your text goes here"
                    bbox_y = 675 - new_height
                    cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + new_width , bbox_y + new_height), (0, 0, 255), 2)  # Red bbox border
                    img[bbox_y:bbox_y + new_height, bbox_x:bbox_x + new_width] = resized_image  # Paste the image inside the bbox
                    # cv2.putText(img, bbox_text, (bbox_x, bbox_y + bbox_height + 30), cv2.FONT_HERSHEY_SIMPLEX, 0.7, (255, 255, 255), 2)

                    
                    for i, ans in enumerate(mcqS.Ans):
                        x = 100 if i % 2 == 0 else 650
                        y = 250 if i < 2 else 400
                        img, bboxAns = cvzone.putTextRect(img, ans, [x, y], 2, 2, offset=50, border=2)
                        if i == 0:
                            bbox1 = bboxAns
                        elif i == 1:
                            bbox2 = bboxAns
                        elif i == 2:
                            bbox3 = bboxAns
                        elif i == 3:
                            bbox4 = bboxAns
                        else:
                            pass
                    if hands:
                        lmList = hands[0]['lmList']
                        cursor = lmList[8]
                        length, info, img = detector.findDistance(lmList[8], lmList[4], img)
                        # print(length)
                        if (length < 60) and (time.time() - last_click_time) >= 1.5:  # Check if the delay has passed
                            mcqS.updateClick(cursor,[bbox1 , bbox2, bbox3, bbox4])
                            # print(mcqS.userAns)
                            last_click_time = time.time()  # Update the last click time
                            if mcqS.userAns is not None:
                                qNoSusah+=1
                                listImg.clear()
                                id_jawaban =None
                                distImg = 0
                                imgid = 1
                                hasShowimg = 0
                                hasShowques = 0
            else:
                scoreSusah = 0

                for mcqS in mcqListSusah:
                    if (mcqS.answer == mcqS.userAns):
                        scoreSusah += 2
                scoreper = round((scoreSusah/(qTotalSusah*2))*100,2)
                img, _ = cvzone.putTextRect(img, "Quiz Completed",[400, 300],2, 2, offset=50, border=5)
                # img, _ = cvzone.putTextRect(img, f'Your Score: {scoreper}%',[700, 300], 2, 2, offset=50, border=5)
                img, bboxDone = cvzone.putTextRect(img, "Selesai",[500, 500], 2, 2, offset=50, border=5)

                if hands:
                    lmlist = hands[0]['lmList']
                    cursor = lmlist[8]
                    length, info, img = detector.findDistance(lmlist[8], lmlist[4], img)

                    if length < 60:
                        cursor = lmlist[8]
                        selesai = mcqS.submit(cursor,bboxDone)
                        if selesai == True:
                            score += scoreSusah
                            break
        else:
            if qNoMudah<qTotalMudah:
                mcqM = mcqListMudah[qNoMudah]
                if mcqM.type == 'drag':
                    # Kotak untuk pertanyaan  
                    if True:
                        questionImage = mcqM.imgQuestion
                        # cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + bbox_width, bbox_y + bbox_height), (0, 0, 0), cv2.FILLED)

                        # Local
                        # C:\xamppMaxy\htdocs\assessment-test-lp\public
                        # bbox_image = cv2.imread(f"C:/xamppMaxy/htdocs/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}")
                        if hasShowques == 0:
                            url = f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}"
                            response = requests.get(url)
                            img_array_ques = np.asarray(bytearray(response.content), dtype=np.uint8)
                            hasShowques = 1
                        bbox_image = cv2.imdecode(img_array_ques, cv2.IMREAD_COLOR)
                        # Server
                        # bbox_image = cv2.imread(f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}")
                        # bbox_height, bbox_width, _ = bbox_image.shape  # Get the width and height of the image

                        new_height = 200   
                        aspect_ratio = bbox_image.shape[1] / bbox_image.shape[0]  # Width / Height
                        new_width = int(new_height * aspect_ratio)
                        resized_image = cv2.resize(bbox_image, (new_width, new_height))

                        # bbox_text = "Your text goes here"
                        bbox_y = 675 - new_height
                        cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + new_width , bbox_y + new_height), (0, 0, 255), 2)  # Red bbox border
                        img[bbox_y:bbox_y + new_height, bbox_x:bbox_x + new_width] = resized_image  # Paste the image inside the bbox
                        # cv2.putText(img, bbox_text, (bbox_x, bbox_y + bbox_height + 30), cv2.FONT_HERSHEY_SIMPLEX, 0.7, (255, 255, 255), 2)



                    if hasShowimg == 0:
                        # distImg = 0
                        # imgid = 1
                        for ansImg in mcqM.Ans:                
                            if 'png' in ansImg:
                                imgType = 'png'
                            else:
                                imgType = 'jpg'
                            # Local
                            # C:\xamppMaxy\htdocs\assessment-test-lp\public
                            # print(ansImg)
                            # listImg.append(DragImg(f"C:/xamppMaxy/htdocs/assessment-test-lp/public/assets/InteligenceSet/Set1/answerImg/{ansImg}", [100 + distImg * 250, 175], imgType,imgid))
                            url = f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/answerImg/{ansImg}"

                            # Download the image from the URL
                            response = requests.get(url)
                            img_array = np.asarray(bytearray(response.content), dtype=np.uint8)

                            # Decode the image using OpenCV
                            answer_image = cv2.imdecode(img_array, cv2.IMREAD_COLOR)
                            
                            # Assuming imgType, imgid, and distImg are already defined
                            listImg.append(DragImg(answer_image, [100 + distImg * 250, 175], imgType, imgid))
                            # Server
                            # listImg.append(DragImg(f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/answerImg/{ansImg}", [100 + distImg * 250, 175], imgType,imgid))
                            distImg += 1
                            imgid += 1
                            hasShowimg = 1
                    
                    

                    # Tonbol Submit
                    img,bbox = cvzone.putTextRect(img,mcqM.question,[100,100],2,2,offset=50,border=2)
                    img,bboxSubmit = cvzone.putTextRect(img,"Submit",[1000,562],2,2,offset=50,border=2)
                    cv2.rectangle(img, (700, 500), (900, 600), [0, 255, 0], 2)
                    cv2.putText(img, "Taruh Jawabanmu Disini", (670, 630), cv2.FONT_HERSHEY_SIMPLEX, 0.7, (255, 255, 255), 2)
                    

                    try:
                        for imgS in listImg:
                            h, w = imgS.size
                            ox, oy = imgS.posOrigin
                            # if imgS.imgType == 'png':
                            #     img = cvzone.overlayPNG(img, imgS.img, [ox, oy])
                            # else:
                            img[oy:oy+h, ox:ox+w] = imgS.img
                    except:
                        pass
                    # print("Id Jawaban = ",id_jawaban)

                    if hands:
                        lmlist = hands[0]['lmList']
                        cursor = lmlist[8]
                        length, info, img = detector.findDistance(lmlist[8], lmlist[4], img)

                        if length < 60:
                            cursor = lmlist[8]
                            if (id_jawaban != None) and (time.time() - last_click_time) >= 1.5:
                                mcqM.update(cursor,bboxSubmit,id_jawaban)
                                if mcqM.userAns is not None:
                                    qNoMudah+=1
                                    listImg.clear()
                                    id_jawaban =None
                                    distImg = 0
                                    imgid = 1
                                    hasShowimg = 0
                                    hasShowques = 0

                                    cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + new_width, bbox_y + new_height), (0, 0, 0), cv2.FILLED)
                                    # Test ubah gambar
                                    
                                    
                            if active_img is not None:
                                active_img.update(cursor)
                        
                        else:
                            for imgS in listImg:
                                ox, oy = imgS.posOrigin
                                h, w = imgS.size
                                if (ox < cursor[0] < ox+w) and (oy < cursor[1] < oy+h):
                                    active_img = imgS
                                    break
                            else:
                                active_img = None

                        
                        # Cek jawaban dengan melihat apa ada gambar di kotak hijau
                        if 700 < cursor[0] < 900 and 500 < cursor[1] < 600:
                            if active_img is not None:
                                # print("Image ID:", active_img.img_id)
                                id_jawaban = active_img.img_id
                                # print(id_jawaban)

                else:
                    img,bbox = cvzone.putTextRect(img,mcqM.question,[100,100],2,2,offset=50,border=2)


                    questionImage = mcqM.imgQuestion
                    # cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + bbox_width, bbox_y + bbox_height), (0, 0, 0), cv2.FILLED)
                    # Local
                    # C:\xamppMaxy\htdocs\assessment-test-lp\public
                    # bbox_image = cv2.imread(f"C:/xamppMaxy/htdocs/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}")
                    if hasShowques == 0:
                        url = f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}"
                        response = requests.get(url)
                        img_array_ques = np.asarray(bytearray(response.content), dtype=np.uint8)
                        hasShowques = 1
                    bbox_image = cv2.imdecode(img_array_ques, cv2.IMREAD_COLOR)
                    # Server 
                    # bbox_image = cv2.imread(f"https://moon.torodeveloper.co/assessment-test-lp/public/assets/InteligenceSet/Set1/questionImg/{questionImage}")
                    # bbox_height, bbox_width, _ = bbox_image.shape  # Get the width and height of the image

                    new_height = 200   
                    aspect_ratio = bbox_image.shape[1] / bbox_image.shape[0]  # Width / Height
                    new_width = int(new_height * aspect_ratio)
                    resized_image = cv2.resize(bbox_image, (new_width, new_height))

                    # bbox_text = "Your text goes here"
                    bbox_y = 675 - new_height
                    cv2.rectangle(img, (bbox_x, bbox_y), (bbox_x + new_width , bbox_y + new_height), (0, 0, 255), 2)  # Red bbox border
                    img[bbox_y:bbox_y + new_height, bbox_x:bbox_x + new_width] = resized_image  # Paste the image inside the bbox
                    # cv2.putText(img, bbox_text, (bbox_x, bbox_y + bbox_height + 30), cv2.FONT_HERSHEY_SIMPLEX, 0.7, (255, 255, 255), 2)

                    
                    for i, ans in enumerate(mcqM.Ans):
                        x = 100 if i % 2 == 0 else 650
                        y = 250 if i < 2 else 400
                        img, bboxAns = cvzone.putTextRect(img, ans, [x, y], 2, 2, offset=50, border=2)
                        if i == 0:
                            bbox1 = bboxAns
                        elif i == 1:
                            bbox2 = bboxAns
                        elif i == 2:
                            bbox3 = bboxAns
                        elif i == 3:
                            bbox4 = bboxAns
                        else:
                            pass
                    if hands:
                        lmList = hands[0]['lmList']
                        cursor = lmList[8]
                        length, info, img = detector.findDistance(lmList[8], lmList[4], img)
                        # print(length)
                        if (length < 60) and (time.time() - last_click_time) >= 1.5:  # Check if the delay has passed
                            mcqM.updateClick(cursor,[bbox1 , bbox2, bbox3, bbox4])
                            # print(mcqM.userAns)
                            last_click_time = time.time()  # Update the last click time
                            if mcqM.userAns is not None:
                                qNoMudah+=1
                                listImg.clear()
                                id_jawaban =None
                                distImg = 0
                                imgid = 1
                                hasShowimg = 0
                                hasShowques = 0
            else:
                scoreMudah = 0
                for mcqM in mcqListMudah:
                    if (mcqM.answer == mcqM.userAns):
                        scoreMudah += 1
                # scoreper = round((scoreMudah/qTotalMudah)*100,2)
                img, _ = cvzone.putTextRect(img, "Quiz Completed",[400, 300],2, 2, offset=50, border=5)
                # img, _ = cvzone.putTextRect(img, f'Your Score: {scoreper}%',[700, 300], 2, 2, offset=50, border=5)
                img, bboxDone = cvzone.putTextRect(img, "Selesai",[500, 500], 2, 2, offset=50, border=5)
                
                if hands:
                    lmlist = hands[0]['lmList']
                    cursor = lmlist[8]
                    length, info, img = detector.findDistance(lmlist[8], lmlist[4], img)

                    if length < 60:
                        cursor = lmlist[8]
                        selesai = mcqM.submit(cursor,bboxDone)
                        if selesai == True:
                            score += scoreMudah
                            break
    cv2.imshow("Img", img)
    cv2.waitKey(1)

if score is None:
    score = -1
print(score)
cap.release()
cv2.destroyAllWindows()